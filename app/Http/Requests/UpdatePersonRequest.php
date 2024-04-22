<?php

namespace App\Http\Requests;

use App\Rules\SouthAfricanIdNumber;
use App\Traits\PrefixMobileNumberTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonRequest extends FormRequest
{
    use PrefixMobileNumberTrait;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'min:2',
                'max:255',
                'required',
            ],
            'surname' => [
                'string',
                'min:2',
                'max:255',
                'required',
            ],
            'south_african_id_no' => [
                'string',
                'min:13',
                'max:13',
                'required',
                'unique:people,south_african_id_no,' . $this->person->id,
                new SouthAfricanIdNumber,
            ],
            'mobile' => [
                'required',
                'unique:people,mobile,' . $this->person->id,
                'phone:mobile,ZA',
            ],
            'email' => [
                'required',
                'unique:people,email,' . $this->person->id,
            ],
            'birth_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'language_id' => [
                'required',
            ],
            'interests' => [
                'required',
            ],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'mobile' => 'mobile number',
            'south_african_id_no' => 'id number',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'mobile.phone' => 'The :attribute field must be a valid South African mobile number.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'mobile' => $this->prefixMobileNumberWithCountryCode($this->mobile) ?? $this->mobile,
        ]);
    }
}
