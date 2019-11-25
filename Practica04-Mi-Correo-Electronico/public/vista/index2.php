<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav>
    <?php
 session_start();
 include '../../config/conexionBD.php';
 $codigo = $_GET["codigo"];
 $sql = "SELECT usu_codigo,usu_rol FROM usuario WHERE usu_codigo = '$codigo'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $_SESSION['isLogged'] = TRUE;
    $row = $result->fetch_assoc();
    if ( $row["usu_rol"]=='user') {
        echo " <td> <a href='crear_reunion.php?codigo=" . $row['usu_codigo'] . "'>Crear Reunion</a> </td> <br>"; 
        echo " <td> <a href='ver_reuniones.php?codigo=1'>Ver Reuniones</a> </td> <br>"; 
        echo " <td> <a href='../../admin/vista/usuario/cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar contraseña</a> </td> <br>";
        echo " <td> <a href='../../admin/vista/usuario/modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar Cuenta</a> </td> <br>";
        echo " <td> <a href='buscar_invitacion.php?codigo=" . $row['usu_codigo'] . "'>Buscar Invitacion</a> </td> <br>";  
    }
    } 
  $conn->close();
 ?>
</body>
</html>