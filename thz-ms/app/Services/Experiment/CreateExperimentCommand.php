<?php

declare(strict_types=1);

namespace App\Services\Experiment;

use App\Models\Experiment;
use App\Models\User;
use App\Repositories\SystemRepository;

final class CreateExperimentCommand
{
    private SystemRepository $systemRepository;

    public function __construct(SystemRepository $systemRepository)
    {
        $this->systemRepository = $systemRepository;
    }

    public function create(User $user, CreateExperimentDto $dto): Experiment
    {
        $this->systemRepository->findOrFail($dto->getSystemId());

        $experiment = new Experiment();
        $experiment->system_id = $dto->getSystemId();
        $experiment->name = $dto->getName();
        $experiment->description = $dto->getDescription();

        $user->experiments()->save($experiment);

        return $experiment;
    }
}
