<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function axisName(): BelongsTo
    {
        return $this->belongsTo(AxisName::class);
    }
}
