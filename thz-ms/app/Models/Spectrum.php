<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Spectrum
 *
 * @package App\Models
 *
 * @property int $id
 * @property-read int $user_id
 * @property-read int $category_id
 * @property string $title
 * @property string $system
 * @property string $mode
 * @property int $temp
 * @property string $state
 * @property string $data
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
        'data',
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
