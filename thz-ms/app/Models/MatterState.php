<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MatterState extends Model
{
    /**
     * @return HasMany|Sample
     */
    public function samples(): HasMany
    {
        return $this->hasMany(Sample::class);
    }
}
