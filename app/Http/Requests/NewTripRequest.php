<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewTripRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'car_id' => 'required|integer',
            'miles' => 'required|numeric',
        ];
    }
}
