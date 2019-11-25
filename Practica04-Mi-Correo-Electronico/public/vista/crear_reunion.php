<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear una reunion</title>
</head>
<body>
 <?php
 $codigo = $_GET["codigo"];
 $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
 include '../../config/conexionBD.php';
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../controladores/crear_reunion2.php">
<input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
<label for="motivo">Motivo</label>
<input type="text" name="motivo" id="motivo">
<br>

<label for="remitente" >Remitente: </label>
<input type="text" id="remitente" name="remitente" value="<?php echo $row["usu_nombres"];
?>"/>
<br>

<label for="fecha y hora">Fecha y hora:</label>
<input type="date" name="fH" id="fH">
<br>
<label for="lugar">Lugar: </label>
<input type="text" name="lugar" id="lugar">
<br>
<label for="coordenadas">coordenadas:  </label>
<input type="text" name="coordenadas" id="coordenadas">
<br>
<label for="observacion">observacion:  </label>
<input type="text" name="observacion" id="observacion">
<br>
<label for="invitados">Invitar a:</label>
<select name="seleccionar" id="seleccionar">
    <?php
     include '../../config/conexionBD.php';
     $codigo = $_GET["codigo"];
     $sql = "SELECT * FROM usuario";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
          
    while($row = $result->fetch_assoc()) {
        if ($row["usu_rol"]=='user') {
            if ($row["usu_codigo"]!=$codigo) {
                echo '<option value="'.$row[usu_nombres].'">'.$row[usu_nombres].'</option>';
                
            }  
        }           
        }
    }  
    ?>
</select>
<br>


 <input type="submit" id="crear" name="crear" value="Crear" />
 
 </form>
 <?php
 }
 } else {
 echo "<p>Ha ocurrido un error inesperado !</p>";
 echo "<p>" . mysqli_error($conn) . "</p>";
 }
 $conn->close();
 ?>
 </body>
</html>