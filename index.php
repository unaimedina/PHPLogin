<html>
<head>
    <title>Test</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <script src="css/script.js"></script>
</head>
<body>
<nav>
    <div class="site-title">Unai Medina</div>
    <ul>
        <li><a href="./admin/login.php">LOGIN</a></li>
    </ul>
</nav>
<main style="text-align: center; margin-top: 50px;">

    <?php
    $conn = mysqli_connect("localhost", "root", "mysqlpassword", "demoASIX1", 3306);

    $query = "SELECT * FROM alumne";
    $result = mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) == 0 || !isset($result)) {
        echo "<div class='card'><h1>No hay usuarios</h1></div>";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $tipus = $row["tipus"];
            $dadesImatge = $row["foto"];
            echo '<div class="card">';
            echo '<img src="data:' . $tipus . ';base64,' . base64_encode($dadesImatge) . '">';

            echo '<h1>' . $row["nom"] . ' ' . $row['cognoms'] . '</h1>';
            echo '<p><a href="#">' . $row["correu"] . '</a></p>';
            // If description is longer than 100 characters, cut it and add "..."
            if (strlen($row["descripcio"]) > 100) {
                $row["descripcio"] = substr($row["descripcio"], 0, 100) . "...";
            }

            echo '<p>' . $row["descripcio"] . '</p>';
            echo '</div>';
        }
    }

    ?>
</main>
</body>
</html>