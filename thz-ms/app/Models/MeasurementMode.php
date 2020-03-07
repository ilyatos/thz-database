<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Class MeasurementMode
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Spectra[] $spectra
 * @property-read int|null $spectra_count
 *
 * @method static Builder|MeasurementMode newModelQuery()
 * @method static Builder|MeasurementMode newQuery()
 * @method static Builder|MeasurementMode query()
 */
class MeasurementMode extends Model
{
    /**
     * @return HasMany|Spectra
     */
    public function spectra(): HasMany
    {
        return $this->hasMany(Spectra::class);
    }
}
