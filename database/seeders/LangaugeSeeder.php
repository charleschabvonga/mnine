<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Throwable;

class LangaugeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Language::count() == 0) {
            try {
                $response = Http::retry(3, 100)->withHeaders([
                    'X-RapidAPI-Host' => config('services.rapidapi.languages.rapid_api_host'),
                    'X-RapidAPI-Key' => config('services.rapidapi.rapid_api_key')
                ])->get(config('services.rapidapi.languages.rapid_api_url'));
    
                if ($response->status() == 200 && $response->successful()) {
                    foreach ($response->json() as $language) {
                        Language::create($language);
                    }
                }
            } catch (Throwable $exception) {
                throw $exception;
            }
        }
    }
}
