<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $fileRequired = request()->method() === 'POST' ? 'required' : 'nullable';
        return [
            'name' => 'required',
            'file'     => $fileRequired.'|mimes:jpeg,jpg,png,gif,svg',
        ];
    }
}
