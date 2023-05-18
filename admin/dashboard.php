<?php
session_start();

if (!isset($_SESSION['user']) || !isset($_SESSION['password'])) {
    header('Location: login.php');
}

if (isset($_POST['salir'])) {
    session_destroy();
    header('Location: ../index.php');
}

// Get close session with hidden input
?>

<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="container">
    <header id="global_header" class="bar">
        <nav id="global_header_nav">
            <p>Bienvenido, <?php echo $_SESSION['user'] ?></p>

            <form id="search" method="POST">
                <input type="radio" name="salir">Seguro?
                <input type="submit" value="Salir">
            </form>
        </nav>
    </header>
</div>

<!-- Apartado 1: Insertar alumnos en la base de datos -->
<div class="contenedor">
    <h1>Insertar usuarios</h1>
    <form action="backend/insert.php" method="post">
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="surname">Apellido</label>
            <input type="text" name="surname" id="surname" required>
        </div>
        <div>
            <label for="email">Correo</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" required>
        </div>
        <div>
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/png, image/gif, image/jpeg">
        </div>
        <div style="text-align: center;">
            <input type="submit" value="Insert">
        </div>
    </form>
</div>
<div style="margin-top: 25px;"></div>
<div class="contenedor">
    <h1>Modificar usuarios</h1>
    <form action="backend/update.php" method="post">
        <div>
            <label for="name">Nombre</label>
            <select name="name" id="name">
                <?php
                $sqlconn = mysqli_connect("localhost", "root", "mysqlpassword", "demoASIX1", 3306);
                $sql = "SELECT * FROM alumne";
                $result = mysqli_query($sqlconn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['codiAlumne'] . "'>" . $row['nom'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label for="surname">Apellido</label>
            <input type="text" name="surname" id="surname" required>
        </div>
        <div>
            <label for="email">Correo</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" required>
        </div>
        <div>
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/png, image/gif, image/jpeg"></div>
        <div style="text-align: center;">
            <input type="submit" value="Actualizar">
        </div>
    </form>
</div>
<div style="margin-top: 25px;"></div>
<div class="contenedor">
    <h1>Eliminar usuarios</h1>
    <form action="backend/delete.php" method="post">
        <div>
            <label for="name">Nombre</label>
            <select name="alumne" id="name">
                <?php
                $sqlconn = mysqli_connect("localhost", "root", "mysqlpassword", "demoASIX1", 3306);
                $sql = "SELECT * FROM alumne";
                $result = mysqli_query($sqlconn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['codiAlumne'] . "'>" . $row['nom'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div style="text-align: center;">
            <input type="submit" value="Eliminar">
        </div>
    </form>
</div>
</body>
</html>
