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

function getHeroTitle(int $xp): string
{
    if ($xp < 100) {
        return "Novato";
    }
    if ($xp < 500) {
        return "Aventureiro";
    }
    if ($xp < 1000) {
        return "Veterano";
    }

    return "Lendário";
}

function printHero(array $hero): void
{
    echo "===== FICHA DO HERÓI =====" . PHP_EOL;
    echo PHP_EOL;
    echo "Nome: " . $hero["name"] . PHP_EOL;
    echo "Classe: " . $hero["class"] . PHP_EOL;
    echo "Nível: " . $hero["level"] . PHP_EOL;
    echo "XP: " . $hero["xp"] . PHP_EOL;
    echo "Título: " . getHeroTitle($hero["xp"]) . PHP_EOL;
    echo PHP_EOL;
}

function getStats(array $heroes): array
{
    $heroesCount = 0;
    $totalXP = 0;
    $strongest = $heroes[0];

    foreach ($heroes as $hero) {
        if ($hero["xp"] > $strongest["xp"]) {
            $strongest = $hero;
        }

        $heroesCount += 1;
        $totalXP += $hero["xp"];
    }

    return [
        "heroesCount" => $heroesCount,
        "totalXP" => $totalXP,
        "strongest" => $strongest,
    ];
}

function printStats(array $heroes): void
{
    $stats = getStats($heroes);

    echo "===== ESTATÍSTICAS =====" . PHP_EOL;
    echo PHP_EOL;
    echo "Total de heróis: " . $stats["heroesCount"] . PHP_EOL;
    echo PHP_EOL;
    echo "XP total: " . $stats["totalXP"] . PHP_EOL;
    echo PHP_EOL;
    echo "XP médio: " . ($stats["totalXP"] / $stats["heroesCount"]) . PHP_EOL;
    echo PHP_EOL;
    echo "Herói mais forte: " . $stats["strongest"]["name"] . PHP_EOL;
    echo "XP: " . $stats["strongest"]["xp"] . PHP_EOL;
    echo PHP_EOL;
}

$heroes = [
    [
        "name" => "Natan",
        "class" => "Guerreiro",
        "level" => 10,
        "xp" => 4000,
    ],
    [
        "name" => "John",
        "class" => "Mago",
        "level" => 3,
        "xp" => 400,
    ],
    [
        "name" => "Lucas",
        "class" => "Tanque",
        "level" => 2,
        "xp" => 340,
    ],
    [
        "name" => "May",
        "class" => "Elfa",
        "level" => 5,
        "xp" => 689,
    ],
    [
        "name" => "Mateus",
        "class" => "Arqueiro",
        "level" => 1,
        "xp" => 50,
    ]
];

$habits = [];

createHabit($habits, "ler", "leia um livro", 20);
createHabit($habits, "treinar", "faça calistenia", 30);
completeHabit($habits, 1);
deleteHabit($habits, 1);

print_r($habits);
