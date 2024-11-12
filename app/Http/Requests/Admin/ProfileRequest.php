<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'file'     => 'nullable|mimes:jpeg,jpg,png,gif,svg',
            'name'     => 'required|max:50',
            'email'    => 'required|unique:users,email,' . Auth()->user()->id,
        ];
    }
}
