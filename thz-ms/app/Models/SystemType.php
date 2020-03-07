<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SystemType extends Model
{
    /**
     * @return HasOne|System
     */
    public function system(): HasOne
    {
        return $this->hasOne(System::class);
    }
}
