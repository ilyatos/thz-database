<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $first_name
 * @property string $second_name
 * @property string $email
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Workspace $workspace
 * @property-read Collection|Workspace[] $workspaces
 * @property-read Collection|Spectrum[] $spectra
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'second_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @param string $firstName
     */
    public function setFirstNameAttribute(string $firstName)
    {
        $this->attributes['first_name'] = ucfirst(strtolower($firstName));
    }

    /**
     * @param string $secondName
     */
    public function setSecondNameAttribute(string $secondName)
    {
        $this->attributes['second_name'] = ucfirst(strtolower($secondName));
    }

    /**
     * @return HasOne|Workspace
     */
    public function workspace(): HasOne
    {
        return $this->hasOne(Workspace::class, 'author_id', 'id');
    }

    /**
     * @return BelongsToMany|Workspace
     */
    public function workspaces(): BelongsToMany
    {
        return $this->belongsToMany(Workspace::class, 'workspace_users');
    }

    /**
     * @return HasMany|Spectrum
     */
    public function spectra(): HasMany
    {
        return $this->hasMany(Spectrum::class);
    }
}
