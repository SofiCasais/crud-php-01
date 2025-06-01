<?php
include 'config.php';
echo "<link rel='stylesheet' href='style.css'>";

// $_SERVER con esta "super-global" detecto con qué método consultan al servidor.

if ($_SERVER["REQUEST_METHOD"] == "POST") { //me fijo si enviaron los datos con POST, si es así, guardo los datos
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "INSERT INTO students (fullname, email, age)
            VALUES ('$name', '$email', $age)"; //atenti a que las variables text llevan '' y age no!!

    if ($connection->query($sql) === TRUE) {
        /*la función header redirige a la página principal index.php
         * de lo contrario, error a insertar, recargaría la misma página.
         */
        header("Location: index.php"); 
        exit;
    } else {
        echo "Error al insertar: " . $connection->error;
    }
}
?>

<h2>Agregar Estudiante</h2>
<form action="insert.php" method="post">
    Nombre completo: <input type="text" name="fullname" required><br>
    Email: <input type="email" name="email" required><br>
    Edad: <input type="number" name="age" required><br>
    <input class="guardar" type="submit" value="Guardar">
</form>
