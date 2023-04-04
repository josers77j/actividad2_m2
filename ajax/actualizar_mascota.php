<?php

include('config.php');

$token = $_GET['token'];
// Obtener los datos actuales del registro
    $nombre = $_GET['nombre'];
    $raza = $_GET['raza'];
    $color = $_GET['color'];
    $peso = $_GET['peso'];
    $altura = $_GET['altura'];
    $sexo = $_GET['sexo'];
    $fech_nacimiento = $_GET['fech_nacimiento'];

// Actualizar el registro en la base de datos
$stmt = $pdo->prepare("UPDATE mascotas SET 
    nombre = :nombre, 
    raza = :raza, 
    color = :color, 
    peso = :peso, 
    altura = :altura, 
    sexo = :sexo, 
    fech_nacimiento = :fech_nacimiento,
WHERE token = :token");

$stmt->execute([
    'nombre' => $nombre,
    'raza' => $raza,
    'color' => $color,
    'peso' => $peso,
    'altura' => $altura,
    'sexo' => $sexo,
    'fech_nacimiento' => $fech_nacimiento,
    'token' => $token
]);










