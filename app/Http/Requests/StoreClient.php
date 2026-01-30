<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest
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
            'name' => 'bail|required|string|min:5|max:50',
            'email' => 'bail|sometimes|email',
            'phone' => 'bail|sometimes|min:6|max:11',
            'address' => 'bail|sometimes|min:10|max:200',
            'photo' => 'sometimes|image'
        ];
    }
}
