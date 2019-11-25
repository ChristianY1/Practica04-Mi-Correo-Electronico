<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Reuniones</title>
</head>
<body>

 <table style="width:100%">
 <tr>
 <th>Fecha </th>
 <th>Lugar</th>
 <th>Coordenadas</th>
 <th>Motivo</th>
 <th>Observacion</th>
 <th>Remitente</th>
 <th>Invitados</th>
 </tr>
 <?php
 include '../../config/conexionBD.php';
 $sql = "SELECT * FROM reuniones";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 echo "<tr>";
 echo " <td>" . $row['r_fecha_hora'] . "</td>";
 echo " <td>" . $row['r_lugar'] ."</td>";
 echo " <td>" . $row['r_coordenadas'] . "</td>";
 echo " <td>" . $row['r_motivo'] . "</td>";
 echo " <td>" . $row['r_observacion'] . "</td>";
 echo " <td>" . $row['r_remitente'] . "</td>";
 echo " <td>" . $row['r_invitado'] . "</td>";
 
 echo "</tr>";
 }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 $conn->close();
 ?>
 </table>
</body>
</html>