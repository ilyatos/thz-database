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
 * Class Sample
 *
 * @package App\Models
 *
 * @property int $id
 * @property int $experiment_id
 * @property int $matter_state_id
 * @property string $name
 * @property string|null $comment
 * @property int $height In millimeters
 * @property int $width In millimeters
 * @property int $thickness In millimeters
 * @property int $weight In grams
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Experiment $experiment
 * @property-read Collection|Spectra[] $spectra
 * @property-read int|null $spectra_count
 * @property-read MatterState $state
 *
 * @method static Builder|Sample newModelQuery()
 * @method static Builder|Sample newQuery()
 * @method static Builder|Sample query()
 */
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
