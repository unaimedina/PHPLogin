<?php
    $dades = $_POST;

    if (isset($dades['user']) && isset($dades['password'])) {
        if ($dades['user'] == 'admin' && $dades['password'] == 'JVjv2023') {
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
            <button>Login</button>
        </form>
    </div>
</div>
</body>
</html>
