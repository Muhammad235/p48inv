<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;
// use Symfony\Component\HttpFoundation\Request;
use Illuminate\Http\Request;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    
    /**
     * Get the validation data that should be used by the request.
     *
     * @return array
     */
    public function validationData()
    {
        // Get the original input data
        $data = $this->all();

        // Get the 'referral_id' from the query parameter 'ref'
        $data['referral_id'] = $this->query('ref');

        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone_no' => ['required', 'max:15', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'username' => ['required', 'string', 'min:8', 'unique:'.User::class],
            // 'referral_id' => ['nullable', 'string', 'min:8', 'exists:users,username']
        ];
    }
}
