<?php

namespace App\Services\System;

final class CreateSystemDto
{
    private int $typeId;
    private string $name;
    private ?string $description;
    private string $manufacturer;

    public function __construct(int $typeId, string $name, ?string $description, string $manufacturer)
    {
        $this->typeId = $typeId;
        $this->name = $name;
        $this->description = $description;
        $this->manufacturer = $manufacturer;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }
}
