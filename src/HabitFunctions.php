<?php

function createHabit(array &$habits, string $name, string $description, int $xp): void
{
    static $id = 1;
    $habits[] = [
        "id" => $id,
        "name" => $name,
        "description" => $description,
        "xp" => $xp,
        "completed" => false,
    ];
    $id++;
}

function findHabitById(array $habits, int $id): ?array
{
    foreach ($habits as $habit) {
        if ($habit["id"] == $id) {
            return $habit;
        }
    }
    return null;
}

function completeHabit(array &$habits, int $id): bool
{
    foreach ($habits as &$habit) {
        if ($habit["id"] == $id) {
            $habit["completed"] = true;
            return true;
        }
    }
    return false;
}

function deleteHabit(array &$habits, int $id): bool
{
    $new = [];
    $founded = false;

    foreach ($habits as $habit) {
        if ($habit["id"] == $id) {
            $founded = true;
            continue;
        }
        $new[] = $habit;
    }

    $habits = $new;
    return $founded;
}

function saveHeroes(array $heroes, string $path): void
{
    file_put_contents($path, json_encode($heroes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function loadHeroes(string $path): array
{
    return json_decode(file_get_contents($path), true);
}
