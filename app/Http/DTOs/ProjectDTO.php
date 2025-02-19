<?php

namespace App\Http\DTOs;

class ProjectDTO
{
    public string $name;
    public string $description;
    public string $due_date;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->due_date = $data['due_date'];
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'due_date' => $this->due_date,
        ];
    }
}
