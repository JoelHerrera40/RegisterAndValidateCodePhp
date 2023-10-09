<?php
$token = $_GET['token'];
$conn = mysqli_connect('127.0.0.1','root','','test');

if (mysqli_connect_error()) {
    echo 'Error connection db' . mysqli_connect_error();
    exit;
}

$query = "SELECT * FROM usuario WHERE token='$token' AND activo=0 LIMIT 1";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    $query = "UPDATE usuario SET activo = 1 WHERE token='$token'";
    mysqli_query($conn, $query);
    echo "¡Tu cuenta ha sido activada correctamente!";
} else {
    echo "El enlace que has utilizado no es válido o ya has activado tu cuenta.";
}

mysqli_close($conn);
?>