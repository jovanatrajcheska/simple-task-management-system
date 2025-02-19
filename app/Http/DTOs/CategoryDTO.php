<?php

namespace App\Http\DTOs;

class CategoryDTO
{
    public string $name;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
    }

    public function toArray(): array
    {
        return ['name' => $this->name];
    }
}
