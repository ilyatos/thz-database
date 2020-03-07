<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Experiment extends Model
{
    /**
     * @return BelongsTo|Research
     */
    public function research(): BelongsTo
    {
        return $this->belongsTo(Research::class);
    }

    /**
     * @return BelongsTo|User
     */
    public function populator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'populator_id');
    }

    /**
     * @return BelongsTo|System
     */
    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class);
    }

    /**
     * @return HasOne|Environment
     */
    public function environment(): HasOne
    {
        return $this->hasOne(Environment::class);
    }

    /**
     * @return HasMany|Sample
     */
    public function samples(): HasMany
    {
        return $this->hasMany(Sample::class);
    }
}
