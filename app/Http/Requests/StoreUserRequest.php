<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
      'name' => 'required|max:255|unique:users,name',
      'username' => 'required|max:255|min:3|unique:users,username',
      'email' => 'required|email|max:255|unique:users,email',
      'password' => 'required|max:255|min:7|confirmed',
    ];
    }
}
