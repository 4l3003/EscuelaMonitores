<?php
session_start();
//validamos si se ha hecho o no el inicio de sesión correctamente
//si no se ha hecho la sesión nos regresará a index.php
if(!isset($_SESSION['nombre'])) 
{
  header('Location: index.html'); 
  exit();
}
$usuario=$_SESSION['nombre'];
?>

<html>
<head>
 <meta charset="UTF-8">
  <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<body>

<?php
$f_inicio=$_REQUEST ['f_inicio'];
$titulo=$_REQUEST ['titulo'];
$orientacion=$_REQUEST ['orientacion'];
$f_fin=$_REQUEST ['f_fin'];
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
$result=mysqli_query($conexion,"select id_orientacion from orientacion where nombre='$orientacion'");
if($row=mysqli_fetch_assoc($result)){
   //Guardo los datos de la BD en las variables de php
   $num = $row["id_orientacion"];}

mysqli_query($conexion,"insert into info values ('','$num','$titulo','$cargar_img','$f_inicio','$f_fin')");

mysqli_free_result($result);
mysqli_close($conexion);
  //Redireccionamos a la pagina: index.php
    echo "<script type='text/javascript'>
     location.href='info.php';
     </script>";
     die();
?>
</body>
</html>