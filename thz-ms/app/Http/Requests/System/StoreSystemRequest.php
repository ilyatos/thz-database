<?php

declare(strict_types=1);

namespace App\Http\Requests\System;

use App\Http\Requests\FormRequest;
use App\Services\System\CreateSystemDto;

final class StoreSystemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'type_id' => 'required|integer',
            'name' => 'required|max:255',
            'description' => 'present|nullable',
            'manufacturer' => 'required|max:255',
        ];
    }

    public function getDto(): CreateSystemDto
    {
        return new CreateSystemDto(
            (int) $this->input('type_id'),
            $this->input('name'),
            $this->input('description'),
            $this->input('manufacturer')
        );
    }
}
