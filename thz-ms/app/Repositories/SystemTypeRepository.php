<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\SystemType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class SystemTypeRepository
{
    private SystemType $systemType;

    public function __construct(SystemType $systemType)
    {
        $this->systemType = $systemType;
    }

    public function findOrFail(int $id): SystemType
    {
        return $this->newModelQuery()->findOrFail($id);
    }

    /**
     * @return Collection|SystemType[]
     */
    public function getAll(): Collection
    {
        return $this->newModelQuery()->get();
    }

    /**
     * @return Builder|SystemType
     */
    private function newModelQuery(): Builder
    {
        return $this->systemType->newModelQuery();
    }
}
