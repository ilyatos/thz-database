<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TransformsRequest;

class SentenceCaseStrings extends TransformsRequest
{
    /**
     * @inheritDoc
     */
    protected function transform($key, $value)
    {
        return is_string($value) && $value !== csrf_token() ? ucfirst(strtolower($value)) : $value;
    }
}
