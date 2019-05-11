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
 * @property array $frequency
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
     * The attributes that should be cast to native types
     *
     * @var array
     */
    protected $casts = [
        'frequency' => 'array',
        'amplitude' => 'array',
    ];

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
