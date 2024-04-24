<?php

namespace App\Traits;

use DateTime;
use Illuminate\Support\Str;

trait GenerateBirthDateFromSouthAfricanIdTrait
{
    public function getGenerateBirthDateFromSouthAfricanId(int $idNumber) : string
    {
        $south_african_id_generated_birth_date = str::substr($this->south_african_id_no, 0, 6);
        $year = str::substr($south_african_id_generated_birth_date, 0, 2);
        $month = str::substr($south_african_id_generated_birth_date, 2, 2);
        $day = str::substr($south_african_id_generated_birth_date, 4, 2);

        if ($year >= 0 && $year <= 24) {
            return DateTime::createFromFormat('Y-m-d', "20".$year."-".$month."-".$day)->format('Y-m-d');
        } else {
            return DateTime::createFromFormat('Y-m-d', "19".$year."-".$month."-".$day)->format('Y-m-d');
        }
    }
}