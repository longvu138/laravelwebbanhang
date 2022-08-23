<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            //
            'name' => 'required',
            'phone' => 'required|unique:users,phone,' . $this->user,
            'gender' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,PNG,jpeg',
            'email' => 'required|email|unique:users,email,' . $this->user,
            'password' => 'nullable|min:6',

        ];
    }
}
