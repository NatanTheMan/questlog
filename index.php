<?php


function printHero(array $hero): void
{
  echo "===== FICHA DO HERÓI =====" . PHP_EOL;
  echo PHP_EOL;
  echo "Nome: " . $hero["name"] . PHP_EOL;
  echo "Classe: " . $hero["class"] . PHP_EOL;
  echo "Nível: " . $hero["level"] . PHP_EOL;
  echo "XP: " . $hero["xp"] . PHP_EOL;
  echo "Título: " . $hero["title"] . PHP_EOL;
}

function getHeroTitle(int $xp): string
{
  if ($xp < 100) {
    return "Novato";
  } elseif ($xp < 500) {
    return "Aventureiro";
  } elseif ($xp < 1000) {
    return "Veterano";
  } else {
    return "Lendário";
  }
}


$hero = [
  "name" => "Natan",
  "class" => "Guerreiro",
  "level" => 1,
  "xp" => 40,
  "title" => "",
];

$hero["title"] = getHeroTitle($hero["xp"]);
printHero($hero);
