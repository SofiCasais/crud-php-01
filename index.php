<?php
/*
 Este es el script por donde comienza el sitio.
 index.php es una convención estándar, como index.html
 */

//Se incluye el archivo de configuración
include 'config.php';

/*uso el objeto connection para ejecutar una consulta a la base de datos. 
  query es una función("método") */

$result = $connection->query("SELECT * FROM students");

//Con echo mostramos por navegador el html al cliente.
 
echo "<!DOCTYPE html>";
echo "<html lang='es'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<link rel='stylesheet' href='style.css'>";
echo "</head>";

echo "<body>";
echo "<div>";
echo "<h1>Listado de Estudiantes</h1>";
echo "</div>";

if ($result->num_rows > 0) {
    echo "<div>";
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Email</th><th>Edad</th><th>Acciones</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['fullname']}</td>
                <td>{$row['email']}</td>
                <td>{$row['age']}</td>
                <td>
                    <a href='update.php?id={$row['id']}'>Editar</a> |
                    <a href='delete.php?id={$row['id']}'>Borrar</a>
                </td>
              </tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "<div class='nuevo'>";
    echo "<a class='nuevoestudiante' href='insert.php'>Agregar nuevo estudiante</a><br><br>";
    echo "</div>";
} 
else {
    echo "No hay estudiantes cargados.";
}
echo "</body>";
echo "</html>";
?>
