<?php

require_once "../../database/Connector.php";

$sql = "SELECT * FROM alumne WHERE codiAlumne = " . $_POST['name'];

$result = mysqli_query($mysql, $sql);

$row = mysqli_fetch_assoc($result);

$name = $row['nom'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];
$descripcion = $_POST['descripcion'];

if (isset($_FILES["foto"])) {
    $foto = file_get_contents($_FILES["foto"]["tmp_name"]);
    $tipo = $_FILES["foto"]["type"];
    $imagen = addslashes($foto);
} else {
    echo "<script>alert('No has introducido una foto'); window.location.href = '..//ç4' +
 '*+8//h+kmnj/xº../index.php';</script>";
}


// Update on database;
$sqlupdate = "UPDATE alumne SET nom = '" . $name . "', cognoms = '" . $surname . "', correu = '" . $email . "', password = '" . hash('md5', $password) . "', descripcio = '" . $descripcion . "', foto = '" . $imagen . "', tipus = '" . $tipo . "' WHERE codiAlumne = " . $_POST['name'];

$resultupdate = mysqli_query($mysql, $sqlupdate);

if ($resultupdate) {
    echo "<script>alert('Alumno modificado correctamente'); window.location.href='../dashboard.php';</script>";
} else {
    echo "<script>alert('Error al modificar alumno'); window.location.href='../dashboard.php';</script>";
}

mysqli_close($mysql);
?>