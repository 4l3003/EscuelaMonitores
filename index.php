<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Escuela</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/superslides.css">
   
  </head>
  <body>
    <div id="slides">
        <ul class="slides-container">
          <?php 
          
          date_default_timezone_set('America/Argentina/Buenos_Aires');
          include ('conexion.php');
         
$result=mysqli_query($conexion,"select * from info order by id_orientacion");
$sw='0';
while($row=mysqli_fetch_assoc($result)){

   //Guardo los datos de la BD en las variables de php
   $num = $row["nombre"];
  $num3 = $row["id_orientacion"];
$num4 = $row["imagen"];
$num5=$row["fecha_inicio"];
$num6=$row["fecha_fin"];
$num7 = $row["id_info"];

if ($num6<=date("Y-m-d"))
{
  
  //Redireccionamos a la pagina: index.php
    echo "<script type='text/javascript'>
     location.href='elimtemporal.php?idinfo=$num7';
     </script>";
}

if ($num5<=date("Y-m-d"))
{ 
  if ($num3==1){
  if ($num4!='images/'){

          echo "<li style='
     background:linear-gradient(black,#4BE9E6,black)'>
          <div class='contenedor'>
          <img src='img/importante.png' class='logo2'> 
           <div class='desfoto'>
            <img src='$num4' class='foto'>
            </div>
            <div class='description'>
              <h2 class='description_title'> $num</h2>
            
            </div>
           </div>
          </li>";
          $sw='1';
        }

        }
          if ($num3==2){
  if ($num4!='images/'){

          echo "<li style='
     background:linear-gradient(black,#4BE9E6,black)'>
          <div class='contenedor'>
          <img src='img/informatica.png' class='logo'> 
           <div class='desfoto'>
            <img src='$num4' class='foto'>
            </div>
            <div class='description'>
              <h2 class='description_title'> $num</h2>
            
            </div>
           </div>
          </li>";
          $sw='1';
        }
        }

          if ($num3==3){
  if ($num4!='images/'){

          echo "<li style='
     background:linear-gradient(black,#4BE9E6,black)'>
          <div class='contenedor'>
          <img src='img/construccion.png' class='logo'> 
           <div class='desfoto'>
            <img src='$num4' class='foto'>
            </div>
            <div class='description'>
              <h2 class='description_title'> $num</h2>
            
            </div>
           </div>
          </li>";
          $sw='1';
        }
     

        }
          if ($num3==4){
  if ($num4!='images/'){

          echo "<li style='
     background:linear-gradient(black,#4BE9E6,black)'>
          <div class='contenedor'>
          <img src='img/turismo.png' class='logo'> 
           <div class='desfoto'>
            <img src='$num4' class='foto'>
            </div>
            <div class='description'>
              <h2 class='description_title'> $num</h2>

            
            </div>
           </div>
          </li>";
          $sw='1';
        }

        }
          if ($num3==5){
  if ($num4!='images/'){

          echo "<li style='
     background:linear-gradient(black,#4BE9E6,black)'>
          <div class='contenedor'>
          <img src='img/basico.png' class='logo'> 
           <div class='desfoto'>
            <img src='$num4' class='foto'>
            </div>
            <div class='description'>
              <h2 class='description_title'> $num</h2>
  
            
            </div>
           </div>
          </li>";
          $sw='1';
        }
       

        }
          if ($num3==6){
  if ($num4!='images/'){

          echo "<li style='
     background:linear-gradient(black,#4BE9E6,black)'>
          <div class='contenedor'>
          <img src='img/institucional.png' class='logo'> 
           <div class='desfoto'>
            <img src='$num4' class='foto'>
            </div>
            <div class='description'>
              <h2 class='description_title'> $num</h2>
         
            
            </div>
           </div>
          </li>";
          $sw='1';
        }
       

        }
          if ($num3==7){
  if ($num4!='images/'){

          echo "<li style='
     background:linear-gradient(black,#4BE9E6,black)'>
          <div class='contenedor'>
          <img src='img/dato.png' class='logo'> 
           <div class='desfoto'>
            <img src='$num4' class='foto'>
            </div>
            <div class='description'>
              <h2 class='description_title'> $num</h2>
   
            
            </div>
           </div>
          </li>";
          $sw='1';
        }

        }
      }

      }

        if ($sw=='0')
        {
           echo "<li style='
     background:linear-gradient(black,#4BE9E6,black)'>
          <div class='contenedor' style='background:rgba(0,0,0,0)'>
          <img src='img/advertencia.png' class='logo'> 
 
              <p  style='text-align:center;font-size:80px;color:black;text-align:center'>Sin noticias :(</p>
            
         
           </div>
          </li>";
        }
?>
        </ul>
        <nav class="slides-navigation">
          <a href="#" class="next">&#62;</a>
          <a href="#" class="prev">&#60;</a>
      </nav>
      </div>
      <script src="js/jquery.js"></script>
      <script src="js/jquery.superslides.js"></script>
  </body>
</html>
