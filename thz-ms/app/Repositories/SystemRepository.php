<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\System;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class SystemRepository
{
    private System $system;

    public function __construct(System $system)
    {
        $this->system = $system;
    }

    public function findOrFail(int $id): System
    {
        return $this->newModelQuery()->findOrFail($id);
    }

    /**
     * @param User $user
     *
     * @return Collection|System[]
     */
    public function getUserSystemsWithType(User $user): Collection
    {
        return $user->systems()->with('type')->get();
    }

    /**
     * @return Builder|System
     */
    private function newModelQuery(): Builder
    {
        return $this->system->newModelQuery();
    }
}
