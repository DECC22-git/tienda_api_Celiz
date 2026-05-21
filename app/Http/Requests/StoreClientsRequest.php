<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientsRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "firts_name"=>'required|String|max:255',
            "last_name"=>'required|String|max:255',
            "email"=>'required|email|unique:clients,email',
            "phone"=>'nullable|String|max:20',
            "address"=>'nullable|String',
        ];
    }
}
