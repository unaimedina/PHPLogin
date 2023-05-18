<?php
$sqlconn = mysqli_connect("localhost", "root", "mysqlpassword", "demoASIX1", 3306);

$sql = "SELECT * FROM alumne WHERE codiAlumne = " . $_POST['name'];

if (mysqli_affected_rows($sqlconn) == 0) {
    echo "<script>alert('No se ha encontrado el usuario');</script>";
    header('Location: ../dashboard.php');
}

$result = mysqli_query($sqlconn, $sql);

$row = mysqli_fetch_assoc($result);

$name = $row['nom'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];
$descripcion = $_POST['descripcion'];
$foto = file_get_contents($_FILES["foto"]["tmp_name"]);
$tipo = $_FILES["imagen"]["type"];
$imagen = addslashes($foto);


// Update on database;
$sqlupdate = "UPDATE alumne SET nom = '" . $name . "', cognoms = '" . $surname . "', correu = '" . $email . "', password = '" . hash('md5', $password) . "', descripcio = '" . $descripcion . "', foto = '" . $imagen . "', tipus = '" . $tipo . "' WHERE codiAlumne = " . $_POST['name'];

$resultupdate = mysqli_query($sqlconn, $sqlupdate);

if ($resultupdate) {
    echo "<script>alert('Alumno modificado correctamente'); window.location.href='../dashboard.php';</script>";
} else {
    echo "<script>alert('Error al modificar alumno'); window.location.href='../dashboard.php';</script>";
}

mysqli_close($sqlconn);
?>