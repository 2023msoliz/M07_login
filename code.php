<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Usuarios</title>
</head>
<body>

<?php
// Define las constantes para la conexión a la base de datos
define("DB_HOST", "localhost");
define("DB_NAME", "users");
define("DB_USER", "root");
define("DB_PSW", '');
define("DB_PORT", 3307);

// Intenta conectarte a la base de datos
$connector = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

if (!$connector) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $active = isset($_POST['active']) ? 1 : 0;

    // Inserta los datos en la tabla user
    $sql = "INSERT INTO user (user_id, name, surname, password, email, rol, active) VALUES ('user_id', '$name', '$surname', '$password', '$email', '$rol', '$active')";

    if (mysqli_query($connector, $sql)) {
        // Redirecciona a la página de confirmación
        header('Location: mostrar.php');
        exit();
    } else {
        echo "Error al guardar el usuario: " . mysqli_error($connector);
    }
}

// Cierra la conexión a la base de datos
mysqli_close($connector);
?>


</body>
</html>