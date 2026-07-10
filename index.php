<?php

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

$heroesCount = 0;
$totalXP = 0;
$strongest = $heroes[0];

foreach ($heroes as $hero) {
    if ($hero["xp"] > $strongest["xp"]) {
        $strongest = $hero;
    }

    $heroesCount += 1;
    $totalXP += $hero["xp"];

    printHero($hero);
}

echo "===== ESTATÍSTICAS =====" . PHP_EOL;
echo PHP_EOL;
echo "Total de heróis: " . $heroesCount . PHP_EOL;
echo PHP_EOL;
echo "XP total: " . $totalXP . PHP_EOL;
echo PHP_EOL;
echo "XP médio: " . ($totalXP / $heroesCount) . PHP_EOL;
echo PHP_EOL;
echo "Herói mais forte: " . $strongest["name"] . PHP_EOL;
echo "XP: " . $strongest["xp"] . PHP_EOL;
echo PHP_EOL;
