<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Interest::count() == 0) {
            $interests = [
                ['name' => 'Community Involvement'],
                ['name' => 'Writing'],
                ['name' => 'Blogging'],
                ['name' => 'Learning Languages'],
                ['name' => 'Photography'],
                ['name' => 'Travel'],
                ['name' => 'Sports'],
                ['name' => 'Reading'],
                ['name' => 'Making Music'],
                ['name' => 'Yoga'],
            ];
    
            foreach ($interests as $interest) {
                Interest::create($interest);
            }
        }
    }
}
