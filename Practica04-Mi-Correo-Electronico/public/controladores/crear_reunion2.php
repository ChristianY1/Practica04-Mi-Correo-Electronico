<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Reunion creada</title>
</head>
<body>
<?php
 //incluir conexión a la base de datos
 include '../../config/conexionBD.php';
 $codigo = $_POST["codigo"];
 $motivo = $_POST["motivo"] ? mb_strtoupper(trim($_POST["motivo"]), 'UTF-8') : null;;
 $remitente = isset($_POST["remitente"]) ? trim($_POST["remitente"]) : null;
 $fechaHora = isset($_POST["fH"]) ? trim($_POST["fH"]): null;
 $lugar = isset($_POST["lugar"]) ? mb_strtoupper(trim($_POST["lugar"]), 'UTF-8') : null;
 $coordenadas = isset($_POST["coordenadas"]) ? mb_strtoupper(trim($_POST["coordenadas"]), 'UTF-8') : null;
 $invitados = isset($_POST["seleccionar"]) ? mb_strtoupper(trim($_POST["seleccionar"]), 'UTF-8') : null;
 $observacion = isset($_POST["observacion"]) ? mb_strtoupper(trim($_POST["observacion"]), 'UTF-8') : null;
 
 date_default_timezone_set("America/Guayaquil");
 $fecha = date('Y-m-d H:i:s', time());
 $sql = "INSERT INTO reuniones VALUES ('2', 'N', '$fechaHora', '$lugar', '$coordenadas', '$motivo', '$observacion',
 '$remitente','$invitados')";

;

 if ($conn->query($sql) === TRUE) {
 echo "Se ha actualizado los datos personales correctamemte!!!<br>";
 } else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
 }
 echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
 $conn->close();
?>
</body>
</html>

 