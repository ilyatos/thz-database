<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class System extends Model
{
    /**
     * @return BelongsTo|SystemType
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(SystemType::class);
    }

    /**
     * @return HasMany|Experiment
     */
    public function experiments(): HasMany
    {
        return $this->hasMany(Experiment::class);
    }
}
