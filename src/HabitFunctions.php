<?php

function saveHeroes(array $heroes, string $path): void
{
    file_put_contents($path, json_encode($heroes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function loadHeroes(string $path): array
{
    return json_decode(file_get_contents($path), true);
}
