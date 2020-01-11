<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 *
 * @package App
 *
 * @property int $id
 * @property string $title
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Collection|Spectrum[] $spectra
 */
class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    /**
     * @param string $title
     *
     * @return void
     */
    public function setTitleAttribute(string $title)
    {
        $this->attributes['title'] = ucfirst(strtolower($title));
    }

    /**
     * @return HasMany|Spectrum
     */
    public function spectra(): HasMany
    {
        return $this->hasMany(Spectrum::class);
    }
}
