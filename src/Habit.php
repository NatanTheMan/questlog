<?php

namespace QuestLog;

use Exception;
use InvalidArgumentException;

class Habit
{
    private static int $nextId = 1;
    private int $id;
    private string $name;
    private string $description;
    private int $xp;
    private bool $completed;

    public function __construct(string $name, string $description, int $xp)
    {
        if ($name === "") {
            throw new InvalidArgumentException("name cant be empty");
        }
        if ($description === "") {
            throw new InvalidArgumentException("description cant be empty");
        }
        if ($xp < 0) {
            throw new InvalidArgumentException("xp should be bigger than zero");
        }

        $this->id = self::$nextId;
        $this->name = $name;
        $this->description = $description;
        $this->xp = $xp;
        $this->completed = false;

        self::$nextId++;
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
    public function getXp(): int
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
