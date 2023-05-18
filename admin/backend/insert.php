<?php
$sqlconn = mysqli_connect("localhost", "root", "mysqlpassword", "demoASIX1", 3306);

if (!isset($_POST['name'])) {
    echo "<script>alert('No has introducido un nombre'); window.location.href = '../../index.php';</script>";
    exit();
} else {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $descripcion = $_POST['descripcion'];

    if (isset($_FILES["foto"]["tmp_name"])) {
        $foto = file_get_contents($_FILES["foto"]["tmp_name"]);
        $tipo = $_FILES["foto"]["type"];
        $imagen = addslashes($foto);
    } else {
        $imagen = "";
        $tipo = "";
    }

    $sql = "INSERT INTO alumne (nom, cognoms, correu, password, descripcio, foto, tipus) VALUES ('$name', '$surname', '$email', '$password', '$descripcion', '$imagen', '$tipo')";

    if (mysqli_query($sqlconn, $sql)) {
        echo "<script>alert('Usuario creado correctamente'); window.location.href = '../dashboard.php';</script>";
    } else {
        echo "<script>alert('Error al crear el usuario'); window.location.href = '../dashboard.php';</script>";
    }

    mysqli_close($sqlconn);
}