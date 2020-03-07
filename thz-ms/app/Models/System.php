<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
     * @return HasOne|Experiment
     */
    public function experiment(): HasOne
    {
        return $this->hasOne(Experiment::class);
    }
}
