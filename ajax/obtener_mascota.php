<?php
include('../config.php');
// Verificar que se ha recibido el ID de la mascota
if (!isset($_GET['tokenMascota'])) {
    die('No se ha recibido el token de la mascota');
}

$tokenMascota = $_GET['tokenMascota'];

// Preparar la consulta SQL para obtener los datos de la mascota
$consulta = $pdo->prepare('SELECT * FROM mascotas WHERE token = :token');

// Asignar el valor del parámetro :id_mascota
$consulta->bindParam(':token', $tokenMascota, PDO::PARAM_INT);

// Ejecutar la consulta
$consulta->execute();

// Obtener los resultados
$mascota = $consulta->fetch(PDO::FETCH_ASSOC);

// Devolver los datos de la mascota como JSON
echo json_encode($mascota);
