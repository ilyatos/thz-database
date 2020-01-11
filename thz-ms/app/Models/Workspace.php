<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Workspace
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $title
 * @property int $author_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read User $author
 * @property-read Collection|User[] $users
 */
class Workspace extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    /**
     * @return BelongsTo|User
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    /**
     * @return BelongsToMany|User
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'workspace_users');
    }
}
