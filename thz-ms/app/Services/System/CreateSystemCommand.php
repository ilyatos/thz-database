<?php

namespace App\Services\System;

use App\Models\System;
use App\Models\SystemType;
use App\Models\User;

final class CreateSystemCommand
{
    private SystemType $systemType;

    public function __construct(SystemType $systemType)
    {
        $this->systemType = $systemType;
    }

    public function execute(User $user, CreateSystemDto $dto): System
    {
        $this->systemType->findOrFail($dto->getTypeId());

        $system = new System();
        $system->type_id = $dto->getTypeId();
        $system->name = $dto->getName();
        $system->description = $dto->getDescription();
        $system->manufacturer = $dto->getManufacturer();

        $user->systems()->save($system);

        return $system;
    }
}
