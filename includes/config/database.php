<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', '', 'bienes_raices');

    if (!$db) {
        echo 'Error: No se pudo conectar.';
        exit;
    }

    return $db;
}