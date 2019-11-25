<?php
 session_start();
 include '../../config/conexionBD.php';
 $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
 $sql = "SELECT usu_codigo,usu_rol FROM usuario WHERE usu_correo = '$usuario' and usu_password =
MD5('$contrasena')";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $_SESSION['isLogged'] = TRUE;
    $row = $result->fetch_assoc();
    if ( $row["usu_rol"]=='user') {
      header("Location: ../vista/index2.php?codigo=" . $row['usu_codigo'] . "");  
    }else{
        header("Location: ../../admin/vista/usuario/index.php");
    }

    } else {
    header("Location: ../vista/login.html");
    }
   
  $conn->close();
 ?>