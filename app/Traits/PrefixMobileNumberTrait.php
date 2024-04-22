<?php

namespace App\Traits;

trait PrefixMobileNumberTrait
{
    public function prefixMobileNumberWithCountryCode(int $mobile) : string
    {
        $south_africa_country_code = '27';

        if (substr($this->mobile, 0, 1) == '0') {
            return $south_africa_country_code . substr($this->mobile, 1);
        }

        return $mobile;
    }
}