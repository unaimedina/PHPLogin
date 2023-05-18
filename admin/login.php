<?php
    $dades = $_POST;
    $db = mysqli_connect('localhost', 'root', 'mysqlpassword', 'demoASIX1', 3306);
    $query = "";

    if (isset($dades['user']) && isset($dades['password'])) {
        // Login query
        $query = "SELECT * FROM users WHERE user = '" . $dades['user'] . "' AND password = '" . hash('md5', $dades['password']) . "'";

        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) == 1) {
            // Login correcte
            session_start();
            $_SESSION['user'] = $dades['user'];
            $_SESSION['password'] = $dades['password'];
            header('Location: dashboard.php');
        } else {
            // Login incorrecte
            echo "<script>alert('Usuario o contraseña incorrectos');</script>";
        }
    }
?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="login-page">
    <div class="form">
        <h1>LOGIN</h1>
        <form class="login-form" method="POST">
            <input type="text" placeholder="Usuario" name="user"/>
            <input type="password" placeholder="Contraseña" name="password"/>
            <button>login</button>
            <p class="message">¿No estás registrado? <a href="register.php">Crear una cuenta</a></p>
        </form>
    </div>
</div>
</body>
</html>
