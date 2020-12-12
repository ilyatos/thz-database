<?php

namespace App\Models\Traits;

trait SentenceAttributeSettable
{
    private function setSentenceAttribute(string $attribute, ?string $value): void
    {
        $this->attributes[$attribute] = $value ? ucfirst(strtolower($value)) : null;
    }
}
