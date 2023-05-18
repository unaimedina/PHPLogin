<?php
$DATA = $_POST;

$sqlconn = mysqli_connect("localhost", "root", "mysqlpassword", "demoASIX1", 3306);

$table = "SHOW TABLES LIKE 'users'";
$result = mysqli_query($sqlconn, $table);

if (mysqli_num_rows($result) == 0) {
    $sql = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user VARCHAR(16) NOT NULL,
        password VARCHAR(200) NOT NULL
)";

$result = mysqli_query($sqlconn, $sql);

// Hacer que se cree la tabla
}

if (isset($DATA['user'])) {
    $sql = "INSERT INTO users (user, password) VALUES ('" . $DATA['user'] . "', '" . hash('md5', $DATA['password']) . "')";
    $result = mysqli_query($sqlconn, $sql);

    if ($result) {
        echo "<script>alert('Usuario registrado correctamente'); location.href = 'login.php' </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($sqlconn);
    }

    mysqli_close($sqlconn);
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
        <h1>REGISTER</h1>
        <form class="login-form" method="POST">
            <input type="text" placeholder="Username" name="user"/>
            <input type="password" placeholder="Password" name="password"/>
            <button>login</button>
            <p class="message">Already registered? <a href="login.php">Login to your account</a></p>
        </form>
    </div>
</div>
</body>
</html>
