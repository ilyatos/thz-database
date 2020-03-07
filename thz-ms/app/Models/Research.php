<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Research extends Model
{
    /**
     * @return BelongsTo|User
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * @return BelongsToMany|User
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps(true, false);
    }

    /**
     * @return HasMany|Experiment
     */
    public function experiments(): HasMany
    {
        return $this->hasMany(Experiment::class);
    }
}
