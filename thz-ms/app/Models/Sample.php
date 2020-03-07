<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sample extends Model
{
    /**
     * @return BelongsTo|Experiment
     */
    public function experiment(): BelongsTo
    {
        return $this->belongsTo(Experiment::class);
    }

    /**
     * @return BelongsTo|MatterState
     */
    public function state(): BelongsTo
    {
        return $this->belongsTo(MatterState::class);
    }

    /**
     * @return HasMany|Spectra
     */
    public function spectra(): HasMany
    {
        return $this->hasMany(Spectra::class);
    }
}
