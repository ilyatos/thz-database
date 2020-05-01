<?php

namespace App\Services\Experiment;

use App\Models\Experiment;
use App\Models\System;
use App\Models\User;

final class CreateExperimentCommand
{
    private System $system;

    public function __construct(System $system)
    {
        $this->system = $system;
    }

    public function create(User $user, CreateExperimentDto $dto): Experiment
    {
        $this->system->findOrFail($dto->getSystemId());

        $experiment = new Experiment();
        $experiment->system_id = $dto->getSystemId();
        $experiment->name = $dto->getName();
        $experiment->description = $dto->getDescription();

        $user->experiments()->save($experiment);

        return $experiment;
    }
}
