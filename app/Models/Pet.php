<?php

namespace App\Models;

use App\Models\Status;

class Pet
{
    private int $id;
    private array $category;
    private string $name;
    private array $photoUrls;
    private array $tags;
    private Status $status;

    public function __construct(int $id, array $category, string $name, array $photoUrls, array $tags, string $status) {
        $this->id = $id;
        $this->category = $category;
        $this->name = $name;
        $this->photoUrls = $photoUrls;
        $this->tags = $tags;
        $this->status = Status::getStatusFromString($status);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategory(): array
    {
        return $this->category;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhotoUrls(): array
    {
        return $this->photoUrls;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function getStatus(): string
    {
        return match ($this->status) {
            Status::Available   => "available",
            Status::Pending     => "pending",
            Status::Sold        => "sold"
        };
    }
}
