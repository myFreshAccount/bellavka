<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskBookRequest extends FormRequest
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
            'user_name' => ['bail', 'required', 'string', 'min:1', 'max:191'],
            'email' => ['bail', 'required', 'string', 'min:1', 'max:191', 'email'],
            'body' => ['bail', 'required', 'string', 'min:1'],
        ];
    }
}
