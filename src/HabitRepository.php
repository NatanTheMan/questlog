<?php

namespace QuestLog;

class HabitRepository
{
    /**
     * @var Habit[]
     */
    private array $habits = [];

    public function add(Habit $habit): void
    {
        $this->habits[] = $habit;
    }

    public function findById(int $id): ?Habit
    {
        foreach ($this->habits as $habit) {
            if ($habit->getId() === $id) {
                return $habit;
            }
        }
        return null;
    }

    public function all(): array
    {
        return $this->habits;
    }

    public function delete(int $id): bool
    {
        $new = [];
        $found = false;

        foreach ($this->habits as $habit) {
            if ($habit->getId() == $id) {
                $found = true;
                continue;
            }
            $new[] = $habit;
        }

        $this->habits = $new;
        return $found;
    }
}
