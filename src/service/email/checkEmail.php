<?php
require_once __DIR__ . "/../../../src/config/PostgreSQL.php";

header('Content-Type: application/json');

// Obtener los datos enviados por el fetch
$data = json_decode(file_get_contents('php://input'), true);

$email = $data['email'];

// Verificar si el correo existe en la base de datos
$query = $conn->prepare("SELECT * FROM usuario WHERE correo = :correo");
$query->bindParam(':correo', $correo);
$query->execute();

$response = [];
if ($query->rowCount() > 0) {
    $response['exists'] = true;
} else {
    $response['exists'] = false;
}

echo json_encode($response);
?>
