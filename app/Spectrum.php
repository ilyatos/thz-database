<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Spectrum extends Model
{
    /**
     * @return BelongsTo|Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
