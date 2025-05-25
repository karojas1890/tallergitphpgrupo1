<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'tiusr24pl_tallergitg01';
$username = 'tallergit';
$password = 'tallergit2025';

// Recoger datos del formulario
$nombre = $_POST['nombre'] ?? '';
$apellido1 = $_POST['apellido1'] ?? '';
$apellido2 = $_POST['apellido2'] ?? '';
$grupo = $_POST['grupo'] ?? '';

// Validación básica del servidor
if (empty($nombre) || empty($apellido1) || empty($apellido2) || empty($grupo)) {
    die('Todos los campos son obligatorios.');
}

try {
    // Conexión a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Preparar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO participantes (Nombre, Apellido1, Apellido2, Numero_de_grupo) 
                           VALUES (:nombre, :apellido1, :apellido2, :grupo)");
    
    // Bind parameters
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido1', $apellido1);
    $stmt->bindParam(':apellido2', $apellido2);
    $stmt->bindParam(':grupo', $grupo);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Redirigir con mensaje de éxito
    header('Location: index.html?status=success');
    exit();
    
} catch(PDOException $e) {
    // Redirigir con mensaje de error
    header('Location: index.html?status=error&message=' . urlencode($e->getMessage()));
    exit();
}
?>