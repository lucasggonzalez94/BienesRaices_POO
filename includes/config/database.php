<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', '', 'bienes_raices');

    if (!$db) {
        echo 'Error: No se pudo conectar.';
        exit;
    }

    return $db;
}