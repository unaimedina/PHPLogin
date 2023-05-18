<html>
<head>
    <title>Index</title>
    <!-- img to base64: https://www.base64-image.de/ -->
    <meta charset="utf-8">
</head>
<body>
    <h1>Index</h1>
    <a href="admin/login.php">Login</a>

    <?php
        $conn = mysqli_connect("localhost", "root", "mysqlpassword", "demoASIX1", 3306);

        $query = "SELECT * FROM alumne";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p><b>Nombre:</b> " . $row['nom'] . "</p>";
            echo "<p><b>Apellido:</b> " . $row['cognoms'] . "</p>";
            echo "<p><b>Correo:</b> " . $row['correu'] . "</p>";
            echo "<p><b>Contraseña:</b> " . $row['password'] . "</p>";
            echo "<p><b>Descripción:</b> " . $row['descripcio'] . "</p>";
            // Echo image blob
            echo '<img width="150px" height="150px" src="data:'.$row['tipus'].';base64,'.base64_encode($row['foto']).'">';
        }
    ?>
</body>
</html>