<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Class SystemType
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|System[] $systems
 * @property-read int|null $systems_count
 *
 * @method static Builder|SystemType newModelQuery()
 * @method static Builder|SystemType newQuery()
 * @method static Builder|SystemType query()
 */
class SystemType extends Model
{
    /**
     * @return HasMany|System
     */
    public function systems(): HasMany
    {
        return $this->hasMany(System::class);
    }
}
