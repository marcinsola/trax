<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewCarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'year' => 'required|integer|digits:4',
            'make' => 'required|string',
            'model' => 'required|string',
        ];
    }
}
