<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Class Research
 *
 * @package App\Models
 *
 * @property int $id
 * @property int $creator_id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $creator
 * @property-read Collection|Experiment[] $experiments
 * @property-read int|null $experiments_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 *
 * @method static Builder|Research newModelQuery()
 * @method static Builder|Research newQuery()
 * @method static Builder|Research query()
 */
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
