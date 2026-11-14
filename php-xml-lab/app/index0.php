<?php
header('Content-Type: text/html; charset=UTF-8');

$json = file_get_contents(__DIR__ . '/data/movies.json');

if ($json === false) {
    exit('Не удалось открыть файл JSON');
}

$movies = json_decode($json, true);

if (!is_array($movies) || !array_is_list($movies)) {
    exit('Ожидался JSON-массив записей');
}

if ($movies === []) {
    exit('Файл пуст');
}

$movie = $movies[0];
echo '<p>' . htmlspecialchars($movie['title_russian']) . '</p>';
echo '<p>Год: ' . $movie['year'] . '</p>';
echo '<p>Всего записей: ' . count($movies) . '</p>';
