<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Spectra
 *
 * @package App\Models
 *
 * @property int $id
 * @property int $sample_id
 * @property int $measurement_mode_id
 * @property int $axis_name_id
 * @property string|null $data
 * @property-read AxisName $axisNames
 * @property-read MeasurementMode $measurementMode
 * @property-read Sample $sample
 *
 * @method static Builder|Spectra newModelQuery()
 * @method static Builder|Spectra newQuery()
 * @method static Builder|Spectra query()
 */
class Spectra extends Model
{
    /**
     * @return BelongsTo|Sample
     */
    public function sample(): BelongsTo
    {
        return $this->belongsTo(Sample::class);
    }

    /**
     * @return BelongsTo|MeasurementMode
     */
    public function measurementMode(): BelongsTo
    {
        return $this->belongsTo(MeasurementMode::class);
    }

    /**
     * @return BelongsTo|AxisName
     */
    public function axisNames(): BelongsTo
    {
        return $this->belongsTo(AxisName::class);
    }
}
