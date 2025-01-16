<?php

namespace App\Models;

use App\Models\Status;
use Exception;

// TODO: I'll have to use this class inside category and tags, as those arrays contains id and name elements
//      where photoUrls is just a array of strings
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
    private array $category;
    private string $name;
    private array $photoUrls;
    private array $tags;
    private Status $status;

    public function __construct(array $values)
    {
        try{
        $this->id = $values['id'] ? (int)$values['id'] : '';

        // if (array_key_exists('category', $values)) {
        //     $this->category = [];
        //     foreach ($values['category'] as $category) {
        //         $this->category[] = new ArrayElement($category['id'], $category['name']);
        //     }
        // }
        $this->category = $values['category'] ?? [];

        $this->name = $values['name'] ?? '';

        if (array_key_exists('photoUrls', $values)) {
            $this->category = [];
            foreach ($values['photoUrls'] as $category) {
                $this->category[] = $category;
            }
        }

        // if (array_key_exists('tags', $values)) {
        //     $this->tags = [];
        //     foreach ($values['tags'] as $tag) {
        //         $this->tags[] = new ArrayElement($tag['id'], $tag['name']);
        //     }
        // }
        $this->tags = $values['tags'] ?? [];

        $this->status = $values['status'] ? Status::getStatusFromString($values['status']) : '';
        } catch(Exception $e) {
            dd($values);
        }
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
        return isset($this->photoUrls) ? implode(',', $this->photoUrls) : '';
    }

    public function getTags(): string
    {
        return is_array($this->tags) ? implode(',', $this->tags[0]) : implode(',', $this->tags);
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
