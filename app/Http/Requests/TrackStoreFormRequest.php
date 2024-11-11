<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackStoreFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date_time' => 'required|date_format:Y-m-d H:i:s',
            'user_agent' => 'required|string|max:50',
            'timezone' => 'required|string|max:50', 
            'ip' => 'required|ip',
            'page_number' => 'required|int',
        ];
    }
}
