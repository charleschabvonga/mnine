<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Throwable;

class SouthAfricanIdNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            $response = Http::retry(3, 100)->withHeaders([
                'X-RapidAPI-Host' => config('services.rapidapi.id_verification.rapid_api_host'),
                'X-RapidAPI-Key' => config('services.rapidapi.rapid_api_key'),
                'content-type' => 'application/json',
            ])->post(config('services.rapidapi.id_verification.rapid_api_url'), [
                'idno' => $value,
            ]);

            if (! $response->json()['valid']) {
                $fail('The :attribute must be a valid South African id number.');
            }
        } catch (Throwable $exception) {
            throw $exception;
        }
    }
}
