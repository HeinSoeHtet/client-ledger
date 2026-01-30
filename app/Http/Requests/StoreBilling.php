<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBilling extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'bail|required|numeric|gt:0',
            'due_date' => 'bail|sometimes|date|after:today',
            'description' => 'bail|sometimes|string|max:200',
            'client_id' => 'bail|sometimes|integer'
        ];
    }
}
