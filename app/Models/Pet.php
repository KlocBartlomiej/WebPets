<?php

namespace App\Models;

use App\Models\Status;
use Exception;

class ArrayElement
{
    private int $id;
    private string $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}

class Pet
{
    private int $id;
    private ArrayElement $category;
    private string $name;
    private array $photoUrls;
    private array $tags;
    private Status $status;

    public function __construct(array $values)
    {
        $this->id = $values['id'] ? (int)$values['id'] : '';

        if (array_key_exists('category', $values) && array_key_exists('name', $values['category'])) {
            $this->category = new ArrayElement($values['category']['id'], $values['category']['name']);
        } else {
            $this->category = new ArrayElement(0, '');
        }

        $this->name = $values['name'] ?? '';

        $this->photoUrls = [];
        if (array_key_exists('photoUrls', $values)) {
            foreach ($values['photoUrls'] as $photoUrl) {
                $this->photoUrls[] = $photoUrl;
            }
        }

        $this->tags = [];
        if (array_key_exists('tags', $values)) {
            foreach ($values['tags'] as $tag) {
                if (array_key_exists('name', $tag)) {
                    $this->tags[] = new ArrayElement($tag['id'], $tag['name']);
                }
            }
        }

        $this->status = $values['status'] ? Status::getStatusFromString($values['status']) : '';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategory(): string
    {
        return $this->category->getName();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhotoUrls(): string
    {
        return implode(',', $this->photoUrls);
    }

    public function getArrayPhotoUrls(): array
    {
        return $this->photoUrls;
    }

    public function getTags(): string
    {
        $result = [];
        foreach ($this->tags as $tag) {
            $result[] = $tag->getName();
        }
        return implode(',', $result);
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
