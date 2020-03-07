<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
     * @return HasOne|Experiment
     */
    public function experiment(): HasOne
    {
        return $this->hasOne(Experiment::class);
    }
}
