<?php
//creamos la sesión
session_start();
//validamos si se ha hecho o no el inicio de sesión correctamente
//si no se ha hecho la sesión nos regresará a index.php
if(!isset($_SESSION['nombre'])) 
{
  header('Location: index.html'); 
  exit();
}
$usuario=$_SESSION['nombre'];
echo "<font size='6' style='position:absolute;z-index:9;top:90;left:40; color:lightblue'><h4>Hola $usuario!</h4></font>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">


<!--===============================================================================================-->
</head>
<body style="background-image: url(../img/fondoadmin.jpg);">

	<div class="bg-container-contact100" style="background-image: url(../img/fondoadmin.jpg);">
		<div class="contact100-header flex-sb-m">
			<a href="info.php" class="contact100-header-logo">
				<img src="../img/logotecnica.png" alt="LOGO">
			</a>
			<div>
				<button class="btn-show-contact100" id="formulario">
					Subir noticia
				</button>
			</div>
			<div>
				<button class="btn-show-contact100" id="cerrarsesion">
					Salir
				</button>
			</div>
		
		</div>
		<br><br><br>
		<center>
		<section  id="tabla_resultado">

        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
</section>
	</div>

	<div id="form" class="container-contact100" style="display:none">
		<div class="wrap-contact100">
			<button class="btn-hide-contact100">
				<i class="zmdi zmdi-close"></i>
			</button>

<div class="contact100-form-title" style="background-image: url(../img/fondoadmin.jpg);">
				<span>Cargar noticia</span>
			</div>

			<form enctype="multipart/form-data" class="contact100-form validate-form" action="subir2.php" method="post">

			
					<div class="wrap-input100 validate-input" id="foto">
					<input  id="file_url"  type="file" name="foto" required>
				</div>

				<div class="wrap-input100 validate-input">
					<input  class="input100" type="date" name="f_inicio" required>
					<span class="focus-input100"></span>
					<label class="label-input100" for="name">
						<span class="lnr lnr-calendar-full m-b-2"></span>
					</label>
				</div>


				<div class="wrap-input100 validate-input">
					<input " class="input100" type="text" name="titulo" placeholder="Titulo..." maxlength="40" required>
					<span class="focus-input100"></span>
					<label class="label-input100" for="email">
						<span class="lnr lnr-pencil m-b-5"></span>
					</label>
				</div>

			<div class="wrap-input100 validate-input">
					<input  class="input100" type="date" name="f_fin" required>
					<span class="focus-input100"></span>
					<label class="label-input100" for="name">
						<span class="lnr lnr-calendar-full m-b-2"></span>
					</label>
				</div>
		<label class="radio-titulo">Orientacion:</label>
				<div style="width:80%;">
			
    		<?php
			include ('conexion.php');
			$resultado_consulta_mysql=mysqli_query($conexion,"SELECT nombre FROM orientacion");
			?>
    		<select name="orientacion" class="wrap-input3">
			<?php
			while ($lista=mysqli_fetch_array($resultado_consulta_mysql)){
			echo "<option value='$lista[nombre]'>".$lista['nombre']. "</option>";
			}
			?>
			</select>
				</div>


				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" >
						Enviar
					</button>
				</div>
			</form>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
-->
<script src="bootstrap/js/main.js"></script>
	<script src="../js/jquery.min.js"></script>
<script src="../js/peticion.js"></script>
</body>

</html>
