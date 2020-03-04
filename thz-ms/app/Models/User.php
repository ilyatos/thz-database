<?php

namespace App\Models;

use Carbon\Carbon;
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
 * @property-read string $short_full_name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
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
     * @return string
     */
    public function getShortFullNameAttribute(): string
    {
        return sprintf('%s %s.', $this->first_name, $this->second_name[0]);
    }

    /**
     * @param string $firstName
     *
     * @return void
     */
    public function setFirstNameAttribute(string $firstName): void
    {
        $this->attributes['first_name'] = ucfirst(strtolower($firstName));
    }

    /**
     * @param string $secondName
     *
     * @return void
     */
    public function setSecondNameAttribute(string $secondName): void
    {
        $this->attributes['second_name'] = ucfirst(strtolower($secondName));
    }
}
