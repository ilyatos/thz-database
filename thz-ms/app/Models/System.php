<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Class System
 *
 * @package App\Models
 *
 * @property int $id
 * @property int $type_id
 * @property string $name
 * @property string|null $description
 * @property string $manufacturer
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read string $name_with_type
 * @property-read Collection|Experiment[] $experiments
 * @property-read int|null $experiments_count
 * @property-read User $user
 * @property-read SystemType $type
 *
 * @method static Builder|System newModelQuery()
 * @method static Builder|System newQuery()
 * @method static Builder|System query()
 */
class System extends Model
{
    public function getNameWithTypeAttribute(): string
    {
        return sprintf('%s (%s)', $this->name, $this->type->name);
    }

    /**
     * @return BelongsTo|User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

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
