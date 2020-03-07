<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Environment extends Model
{
    /**
     * @return BelongsTo|Experiment
     */
    public function experiment(): BelongsTo
    {
        return $this->belongsTo(Experiment::class);
    }
}
