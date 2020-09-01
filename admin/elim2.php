<?php
session_start();
//validamos si se ha hecho o no el inicio de sesión correctamente
//si no se ha hecho la sesión nos regresará a index.php
if(!isset($_SESSION['nombre'])) 
{
  header('Location: index.html'); 
  exit();
}
?>
<html>
<head>
<title> Eliminar noticias </title>
<meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<center>
<body>
<?php
// Notificar todos los errores excepto E_NOTICE
// Este es el valor predeterminado establecido en php.ini
error_reporting(0);

include('conexion.php');

	$id_info=$_REQUEST['idinfo'];
 
$registros=mysqli_query($conexion,"select id_info from info
                       where id_info='$id_info'");
	if ($reg=mysqli_fetch_array($registros))
	{
  	mysqli_query($conexion,"delete from info where id_info='$id_info'");
    mysqli_free_result($registros);
	mysqli_close($conexion);
    
//Redireccionamos a la pagina: index.php
    echo "<script type='text/javascript'>
     location.href='info.php';
     </script>";
die();
}
	?>


</body>
</html>

