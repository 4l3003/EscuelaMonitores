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



$id_info=$_REQUEST['idinfo'];


include('conexion.php');

$registros=mysqli_query($conexion,"select id_info from info
                       where id_info='$id_info'");
  if ($reg=mysqli_fetch_array($registros))
  {
    mysqli_query($conexion,"delete from info where id_info='$id_info'");

      mysqli_free_result($registros);
  mysqli_close($conexion);
//Redireccionamos a la pagina: index.php
    echo "<script type='text/javascript'>
     location.href='index.php';
     </script>";
die();
}

 
  
	?>


</body>
</html>