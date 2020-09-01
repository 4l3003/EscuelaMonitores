<?php
session_start();
//validamos si se ha hecho o no el inicio de sesión correctamente
//si no se ha hecho la sesión nos regresará a index.php
if(!isset($_SESSION['nombre'])) 
{
  header('Location: index.html'); 
  exit();
}
error_reporting(0);
   date_default_timezone_set('America/Argentina/Buenos_Aires');
$usuario=$_SESSION['nombre'];
/////// CONEXIÓN A LA BASE DE DATOS /////////
include 'conexion.php';
//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT * FROM info,orientacion where info.id_orientacion=orientacion.id_orientacion";
//$result=mysqli_query($conexion,"SELECT nota.titulo,notero.nom bre FROM nota,notero where notero.id_notero=nota.id_notero");
//if($row=mysqli_fetch_assoc($result)){
   //Guardo los datos de la BD en las variables de php
   //$num = $row['nombre'];
   //}
///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
/*if(isset($_POST['nota']))
{
	$q=$conexion->real_escape_string($_POST['nota']);
	$query="SELECT * FROM orientacion,info WHERE 
	    (orientacion.id_orientacion=info.id_orientacion) and
		(info.nombre LIKE '%".$q."%' OR
		info.resumen LIKE '%".$q."%' OR
		info.cuerpo LIKE '%" .$q."%'
	    )";
}*/

$buscarnota=$conexion->query($query);
if ($buscarnota->num_rows > 0)
{
	$tabla.= 
	'<table class="table" style="background: rgba(0,0,0,0.6);width:85%;color:white;">
		<tr class="bg-danger">
		
			<td>Fecha Inicio</td>
			<td>titulo</td>
			<td>Imagen</td>
			<td>Orientacion</td>
			<td>Fecha fin</td>
			<td><span class="glyphicon glyphicon-refresh"></span></td>
			<td><span class="glyphicon glyphicon-remove-circle"></span></td>
		
		</tr>';


	while($filanota= $buscarnota->fetch_assoc())
	{   
			

$result = mysqli_query($conexion,"SELECT nombre, imagen FROM info WHERE id_info='$filanota[id_info]'");
if($row = mysqli_fetch_assoc($result)){
   //Guardo los datos de la BD en las variables de php
   $var = $row["nombre"];
   $img = $row["imagen"];
}

 $timeActual= time();   // Obtenemos el timestamp del momento actual
     $timeVencimiento = strtotime($filanota['fecha_inicio']); // Obtenemos timestamp de la fecha de vencimiento
    // Calculamos el número de segundos que tienen esos 3 días
  $segundos = 1 * 24 * 60 * 60;
    // Condición: Si la diferencia entre la fecha de vencimiento y la fecha actual es menor de 3 días
 if( $timeActual-$timeVencimiento >$segundos or date("Y-m-d")==$filanota['fecha_inicio']) {
		$tabla.=
		'<tr>
			<td style=background-color:none>'.$filanota['fecha_inicio'].'</td>';
		}
		else
		{
			$tabla.=
		'<tr>
			<td style=background-color:tomato>'.$filanota['fecha_inicio'].'</td>';
		}
			$tabla.='
			<td>'.$var.'</td>
			<td><img src=../'.$img.' width=50></td>
			<td>'.$filanota['nombre'].'</td>
			<td>'.$filanota['fecha_fin'].'</td>
			<td><form method=post action=modifica2.php>
			<input type=hidden name=idinfo value='.$filanota['id_info'].'>
			<button class="btn btn-danger btn-sm active"><span class="glyphicon glyphicon-refresh"></span> </button></form></td>
			<td><form method=post action=elim2.php>
			<input type=hidden name=idinfo value='.$filanota['id_info'].'>
			<button type="submit" class="btn btn-danger btn-sm active"><span class="glyphicon glyphicon-trash"></span> </button>
			</form></td>
			
		 </tr>';
		
		}
	
			$tabla.='</table>';
} else
	{
		$tabla="<h3 style='color:yellow'>Sin noticias.</h3>";
	}


echo $tabla;
?>
