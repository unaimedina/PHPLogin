<?php
if (!isset($_SESSION['user']) || !isset($_SESSION['password'])) {
    header('Location: ../login.php');
}

$data = $_POST;

require_once "../../database/Connector.php";
$query = "DELETE FROM alumne WHERE codiAlumne = " . $data['alumne'];

echo $query;

$result = mysqli_query($mysql, $query);

if ($result) {
    echo "<script>alert('Alumno eliminado correctamente'); location.href = '../dashboard.php' </script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($mysql);
}