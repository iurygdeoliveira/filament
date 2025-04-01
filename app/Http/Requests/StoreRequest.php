<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string',
            'logo' => 'string',
            'slug' => 'string',
            'about' => 'string',
            'phone' => 'string',
        ];
    }
}
