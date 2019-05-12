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
            'category_id' => 'numeric',
            'new_category' => 'string|max:255',
            'title' => 'required|max:255',
            'temp' => 'required|numeric',
            'state' => 'required|in:solid,liquid,gas,plasma',
            'spectrum' => 'required|file|mimes:csv,txt'
        ];
    }
}
