<?php

namespace App\Services\Experiment;

class CreateExperimentDto
{
    private int $systemId;
    private string $name;
    private ?string $description;

    public function __construct(int $systemId, string $name, ?string $description)
    {
        $this->systemId = $systemId;
        $this->name = $name;
        $this->description = $description;
    }

    public function getSystemId(): int
    {
        return $this->systemId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
