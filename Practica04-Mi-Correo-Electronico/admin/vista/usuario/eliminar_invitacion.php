<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar datos de persona </title>
</head>
<body>
<?php
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';
 $codigo = $_GET["codigo"];

 //Si voy a eliminar físicamente el registro de la tabla
 //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
 date_default_timezone_set("America/Guayaquil");
 $fecha = date('Y-m-d H:i:s', time());
 $sql = "UPDATE reuniones SET r_eliminada = 'S' WHERE
r_codigo = $codigo";
 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
 } else {
 echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
 }

 $conn->close();
 ?>
 </body>
 </html>