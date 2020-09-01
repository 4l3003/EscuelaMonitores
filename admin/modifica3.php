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
<title>Modificación de noticias</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<center>
<body>

<br>
<br>
<?php
error_reporting(0);
$id_info=$_REQUEST['idinfo'];
$orientacion=$_REQUEST['orientacion'];
$orientacionv=$_REQUEST['orientacionviejo'];
//capturamos los datos del fichero subido    
$type=$_FILES['foto']['type'];
$tmp_name = $_FILES['foto']['tmp_name'];
$name = $_FILES['foto']['name'];
//Creamos una nueva ruta (nuevo path)
//Así guardaremos nuestra imagen en la carpeta "images"
$nuevo_path="../images/".$name;
$cargar_img="images/".$name;
//Movemos el archivo desde su ubicación temporal hacia la nueva ruta
# $tmp_name: la ruta temporal del fichero
# $nuevo_path: la nueva ruta que creamos
move_uploaded_file($tmp_name,$nuevo_path);
//Extraer la extensión del archivo. P.e: jpg
# Con explode() segmentamos la cadena de acuerdo al separador que definamos. En este caso punto (.)
$array=explode('.',$nuevo_path);
# Capturamos el último elemento del array anterior que vendría a ser la extensión
$ext= end($array);

include ('conexion.php');
$result=mysqli_query($conexion,"select id_orientacion from orientacion where 
  nombre='$orientacion'");
if($row=mysqli_fetch_assoc($result)){
   //Guardo los datos de la BD en las variables de php
$num = $row["id_orientacion"];
 
   }

$registros=mysqli_query($conexion, "update info
                         set fecha_inicio='$_REQUEST[datenuevo]' 
                         where fecha_inicio='$_REQUEST[dateviejo]' and id_info='$id_info'") or
  die("Problemas en el select:".mysql_error($conexion));
  
  $registros=mysqli_query($conexion,"update info
                         set nombre='$_REQUEST[titulonuevo]' 
                         where nombre='$_REQUEST[tituloviejo]' and id_info='$id_info'") or
  die("Problemas en el select:".mysql_error($conexion));

  $registros=mysqli_query($conexion,"update info
                         set id_orientacion='$num' 
                         where (id_orientacion='$orientacionv') and (id_info='$id_info')") or
  die("Problemas en el select:".mysql_error($conexion));
    
      $registros=mysqli_query($conexion,"update info
                         set fecha_fin='$_REQUEST[datenuevo2]' 
                         where fecha_fin='$_REQUEST[dateviejo2]' and id_info='$id_info'") or
  die("Problemas en el select:".mysql_error($conexion));


        $registros=mysqli_query($conexion,"update info
                         set imagen='$cargar_img' 
                         where id_info='$id_info'") or
  die("Problemas en el select:".mysql_error($conexion));

//Redireccionamos a la pagina: index.php

echo "<script language=Javascript>
 location.href=\"info.php\"; </script>"; 
die();

?>

</body>
</html>