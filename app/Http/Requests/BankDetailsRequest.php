<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankDetailsRequest extends FormRequest
{
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
            'account_number' => ['required', 'integer'],
            'account_name' => ['required', 'string', 'max:100'],
            'bank_name' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:300'],
        ];
    }
}
