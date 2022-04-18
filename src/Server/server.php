<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=symfony_groupe_hotelier;charset=utf8mb4', username: 'root', password: '');
    $statement = $pdo->query('SELECT establishment_id_id, id, title  FROM suite', PDO::FETCH_ASSOC);
    $suites = $statement->fetchAll();
    exit(json_encode($suites));
} catch (PDOException $e){
    echo 'Impossible de récupérer les données';
}
