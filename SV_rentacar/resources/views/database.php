<?php

/**
 * database.php
 * @since 2024/04/23
 */
function h($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'utf-8');
}

function connect()
{
    $dsn = 'mysql:host=127.0.0.1;dbname=sv_rentacar;charset=utf8mb4;';
    $username = 'servantop';
    $password = 'servan01';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    $pdo = new PDO($dsn, $username, $password, $options);
    return $pdo;
}