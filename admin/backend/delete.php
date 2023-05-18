<?php

$data = $_POST;

$mysql = mysqli_connect("localhost", "root", "mysqlpassword", "demoASIX1", 3306);
$query = "DELETE FROM alumne WHERE codiAlumne = " . $data['alumne'];

echo $query;

$result = mysqli_query($mysql, $query);

if ($result) {
    echo "<script>alert('Alumno eliminado correctamente'); location.href = '../dashboard.php' </script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($mysql);
}