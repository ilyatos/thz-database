<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * Class Experiment
 *
 * @package App\Models
 *
 * @property int $id
 * @property int|null $research_id
 * @property int $populator_id
 * @property int $system_id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Environment $environment
 * @property-read User $populator
 * @property-read Research|null $research
 * @property-read Collection|Sample[] $samples
 * @property-read int|null $samples_count
 * @property-read System $system
 *
 * @method static Builder|Experiment newModelQuery()
 * @method static Builder|Experiment newQuery()
 * @method static Builder|Experiment query()
 */
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
