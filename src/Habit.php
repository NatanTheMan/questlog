<?php

namespace QuestLog;

class Habit
{
    private static int $id = 1;
    private string $name;
    private string $description;
    private int $xp;
    private bool $completed;

    public function __construct(string $name, string $description, int $xp)
    {
        $this->name = $name;
        $this->description = $description;
        $this->xp = $xp;
        $this->completed = false;
        $this->id++;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
    public function getXP(): int
    {
        return $this->xp;
    }

    public function isCompleted(): bool
    {
        return $this->completed;
    }

    public function complete(): void
    {
        $this->completed = true;
    }
}
