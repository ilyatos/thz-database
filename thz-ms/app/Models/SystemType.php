<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SystemType extends Model
{
    /**
     * @return HasMany|System
     */
    public function systems(): HasMany
    {
        return $this->hasMany(System::class);
    }
}
