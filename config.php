<?php
/* Datos de conexión: en variables en php */
$host = "localhost";
$user = "students_user";
$password = "12345";
$database = "students_db";

/*
 $connection "variable", objeto instancia de mysqli
 que permite ingresar a la bd dado que instancio una
 conexión a la base de datos con las variables definidas arriba.
 */
$connection = new mysqli($host, $user, $password, $database);

/*
 Verifico la conexión, si hay error corto la interpretación con la función "die"
 y muestro por pantalla el error.
 */ 

if ($connection->connect_error) {
    die("Error de conexión: " . $connection->connect_error);
}
?>
