<?php

declare(strict_types=1);

namespace App\Services\System;

use App\Models\System;
use App\Models\User;
use App\Repositories\SystemTypeRepository;

final class CreateSystemCommand
{
    private SystemTypeRepository $systemTypeRepository;

    public function __construct(SystemTypeRepository $systemTypeRepository)
    {
        $this->systemTypeRepository = $systemTypeRepository;
    }

    public function execute(User $user, CreateSystemDto $dto): System
    {
        $this->systemTypeRepository->findOrFail($dto->getTypeId());

        $system = new System();
        $system->type_id = $dto->getTypeId();
        $system->name = $dto->getName();
        $system->description = $dto->getDescription();
        $system->manufacturer = $dto->getManufacturer();

        $user->systems()->save($system);

        return $system;
    }
}
