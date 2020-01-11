<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Spectrum
 *
 * @package App
 *
 * @property int $id
 * @property-read int $user_id
 * @property-read int $category_id
 * @property string $title
 * @property string $system
 * @property string $mode
 * @property int $temp
 * @property string $state
 * @property-read string $points
 * @property array $frequency
 * @property-read float $min_freq
 * @property-read float $max_freq
 * @property array $amplitude
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read User $user
 * @property-read Category $category
 */
class Spectrum extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'spectra';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'system',
        'mode',
        'category_id',
        'title',
        'temp',
        'state',
        'frequency',
        'amplitude'
    ];

    /**
     * @param string $value
     */
    public function setTitleAttribute(string $value): void
    {
        $this->attributes['title'] = ucfirst(strtolower($value));
    }

    /**
     * @param string $value
     */
    public function setSystemAttribute(string $value): void
    {
        $this->attributes['system'] = strtolower($value);
    }

    /**
     * @param string $value
     *
     * @return array
     */
    public function getFrequencyAttribute(string $value): array
    {
        return unserialize($value, ['allowed_classes' => false]);
    }

    /**
     * @param string $value
     *
     * @return array
     */
    public function getAmplitudeAttribute(string $value): array
    {
        return unserialize($value, ['allowed_classes' => false]);
    }

    /**
     * @return float
     */
    public function getMinFreqAttribute(): float
    {
        return $this->frequency[0];
    }

    /**
     * @return float
     */
    public function getMaxFreqAttribute(): float
    {
        return $this->frequency[count($this->frequency) - 1];
    }

    /**
     * @return string
     */
    public function getPointsAttribute(): string
    {
        $point = static function (float $x, float $y) {
            return [
                'x' => $x,
                'y' => $y
            ];
        };

        $points = [];
        $numberOfPoints = count($this->frequency);

        for ($i = 0; $i < $numberOfPoints; $i++) {
            $points[] = $point($this->frequency[$i], $this->amplitude[$i]);
        }

        return json_encode($points);
    }

    /**
     * @return BelongsTo|User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo|Category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
