<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class Environment
 *
 * @package App\Models
 *
 * @property int $id
 * @property int $experiment_id
 * @property int $temperature Kelvin temperature
 * @property int $humidity Humidity as a percentage
 * @property int|null $pressure Atmospheric pressure as a mmHg
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Experiment $experiment
 *
 * @method static Builder|Environment newModelQuery()
 * @method static Builder|Environment newQuery()
 * @method static Builder|Environment query()
 */
final class Environment extends Model
{
    /**
     * @return BelongsTo|Experiment
     */
    public function experiment(): BelongsTo
    {
        return $this->belongsTo(Experiment::class);
    }
}
