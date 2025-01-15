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

    public function __construct(int $id, string $category, string $name, string $photoUrls, string $tags, string $status)
    {
        $this->id = $id;
        $this->category = explode(',', $category);
        $this->name = $name;
        $this->photoUrls = explode(',', $photoUrls);
        $this->tags = explode(',', $tags);
        $this->status = Status::getStatusFromString($status);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategory(): string
    {
        return implode(',', $this->category);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhotoUrls(): string
    {
        return implode(',', $this->photoUrls);
    }

    public function getTags(): string
    {
        return implode(',', $this->tags);
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
