<?php

namespace App\Http\DTOs;

class TaskDTO
{
    public string $title;
    public ?string $description;
    public int $project_id;
    public int $category_id;
    public string $due_date;
    public bool $status;

    public function __construct(array $data)
    {
        $this->title = $data['title'];
        $this->description = $data['description'] ?? null;
        $this->project_id = $data['project_id'];
        $this->category_id = $data['category_id'];
        $this->due_date = $data['due_date'];
        $this->status = $data['status'] ?? false;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'project_id' => $this->project_id,
            'category_id' => $this->category_id,
            'due_date' => $this->due_date,
            'status' => $this->status,
        ];
    }
}
