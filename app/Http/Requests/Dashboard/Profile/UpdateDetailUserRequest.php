<?php

namespace App\Http\Requests\Dashboard\Profile;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\DetailUser;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

class UpdateDetailUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
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
            'photo' => [
                'nullable', 'file', 'max:1024',
            ],
            'role' => [
                'required', 'string', 'max:100',
            ],
            'contact_number' => [
                'required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:12',
            ],
            'biography' => [
                'nullable', 'string', 'max:5000',
            ],
        ];
    }
}
