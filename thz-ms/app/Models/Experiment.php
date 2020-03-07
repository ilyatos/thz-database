<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
