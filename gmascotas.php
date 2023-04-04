<?php
include('config.php');
//preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['correo']) en caso de un email

if (preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ ]+$/', $_GET['nombre'])&&
    preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ ]+$/', $_GET['raza']) &&
    preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ ]+$/', $_GET['color']) ) {
    $nombre = $_GET['nombre'];
    $raza = $_GET['raza'];
    $color = $_GET['color'];
    $peso = $_GET['peso'];
    $altura = $_GET['altura'];
    $sexo = $_GET['sexo'];
    $fech_nacimiento = $_GET['fech_nacimiento'];
    $token = md5($_GET['nombre']. "+".$_GET['raza'] . "+" . $_GET['color']);
    $stmt = $pdo->prepare('INSERT INTO mascotas (nombre, raza, color, peso, altura, sexo, fech_nacimiento, token) VALUES (:nombre, :raza, :color, :peso, :altura, :sexo, :fech_nacimiento, :token)');
    if ($stmt->execute(array(
        ':nombre' => $nombre,
        ':raza' => $raza,
        ':color' => $color,
        ':peso' => $peso,
        ':altura' => $altura,
        ':sexo' => $sexo,
        ':fech_nacimiento' => $fech_nacimiento,
        ':token' => $token
        
        
    )))
     
    {
    } else {
        echo "<script>alert('Error al registrar la mascota');</script>";
    }
}else{
    echo "<script>alert('Error al registrar la mascota');</script>";    
}


$pdo = null;
