<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Class AxisName
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $y_axis
 * @property string $x_axis
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Spectra[] $spectra
 * @property-read int|null $spectra_count
 *
 * @method static Builder|AxisName newModelQuery()
 * @method static Builder|AxisName newQuery()
 * @method static Builder|AxisName query()
 */
class AxisName extends Model
{
    /**
     * @return HasMany|Spectra
     */
    public function spectra(): HasMany
    {
        return $this->hasMany(Spectra::class);
    }
}
