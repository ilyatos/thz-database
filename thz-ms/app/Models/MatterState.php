<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Class MatterState
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Sample[] $samples
 * @property-read int|null $samples_count
 *
 * @method static Builder|MatterState newModelQuery()
 * @method static Builder|MatterState newQuery()
 * @method static Builder|MatterState query()
 */
class MatterState extends Model
{
    /**
     * @return HasMany|Sample
     */
    public function samples(): HasMany
    {
        return $this->hasMany(Sample::class);
    }
}
