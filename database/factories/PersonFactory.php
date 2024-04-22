<?php

namespace Database\Factories;

use App\Models\Interest;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $languages = Language::all();
        $interests = Interest::pluck('id')->toArray();
        $codes = [60,61,62,63,64,65,66,67,68,69,71,72,73,74,76,78,79,81,82,83,84];

        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'south_african_id_no' => random_int(1111111111111, 9999999999999),
            'mobile' => 27 . Arr::random($codes, 1)[0] . random_int(1000000, 9999999),
            'email' => fake()->unique()->safeEmail(),
            'birth_date' => fake()->dateTimeBetween($startDate = '-70 years', $endDate = '-18', $timezone = null),
            'language_id' => fake()->numberBetween(1, $languages->count()),
            'interests' => json_encode(array_rand($interests, random_int(2, 10)))
        ];
    }
}
