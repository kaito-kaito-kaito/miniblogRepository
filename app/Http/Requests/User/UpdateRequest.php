<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;


class UpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email,' . $this->user()->id . '|max:255',
            'file' => 'image',
            'career' => 'required|string|min:20|max:2000',
        ];
    }
}
