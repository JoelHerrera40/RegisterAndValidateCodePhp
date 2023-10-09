<?php

require_once 'services/PHPMailAutoload.php';

use BackendValidation\services\SendMail;

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];
$token = md5(uniqid(rand(), true));

$conn = mysqli_connect('127.0.0.1', 'root', '', 'test');

if (mysqli_connect_error()) {
    echo 'Error connection db' . mysqli_connect_error();
    exit;
}

$queryd = "SELECT email FROM usuario WHERE email='$email'";
$results = mysqli_query($conn, $queryd);

if (mysqli_num_rows($results) > 0 ) {
    echo "Este correo electrónico ya ha sido registrado.";
    exit;
}

$query = " INSERT INTO usuario (nombre,email,password,token,activo) VALUES ('$nombre','$email','$password','$token',0)";

$result = mysqli_query($conn, $query);

if ($result) {
    $to = $email;
    $subjdect = 'Confirmacion de registro';
    $message = 'Hola ' . $nombre . ', gracias por registrarte. Para completar tu registro, haz clic en el siguiente enlace: <a href="http://localhost:8080/challenge/BackendValidation/activeUsers.php?token=' . $token . '">Confirmar Registro</a>';
    header('Location: confirm.php ');
    $mail = SendMail::sendIn($email, $subjdect, $message,$nombre);
} else {
    echo 'Ha ocurrido un error al registrar';
}

mysqli_close($conn);
