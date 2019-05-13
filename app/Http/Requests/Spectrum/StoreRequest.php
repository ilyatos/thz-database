<?php

namespace App\Http\Requests\Spectrum;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'system' => 'required|string|max:255',
            'mode' => 'required|in:transmission,reflection',
            'new_category' => 'string|nullable|max:255|required_if:category_id,0',
            'title' => 'required|max:255',
            'temp' => 'required|numeric',
            'state' => 'required|in:solid,liquid,gas,plasma',
            'spectrum' => 'required|file|mimetypes:text/csv'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'new_category.required_if' => 'The new category field is required when category is not selected.'
        ];
    }
}
