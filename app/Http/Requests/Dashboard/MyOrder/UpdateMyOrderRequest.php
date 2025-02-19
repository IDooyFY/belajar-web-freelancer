<?php

namespace App\Http\Requests\Dashboard\MyOrder;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

class UpdateMyOrderRequest extends FormRequest
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
            'buyer_id' => [
                'nullable', 'integer',
            ],
            'freelancer_id' => [
                'nullable', 'integer',
            ],
            'service_id' => [
                'nullable', 'integer', 
            ],
            'file' => [
                'required', 'mimes:zip', 'max:1024',
            ],
            'note' => [
                'required', 'string', 'max:10000',
            ],
            'expired' => [
                'nullable', 'date',
            ],
            'order_status_id' => [
                'nullable', 'integer',
            ],
        ];
    }
}
