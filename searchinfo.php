<html lang="es">
   <!-- https://codepen.io/pruthvi10/pen/MWJxXJx -->
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Busqueda de placas</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <style>
         #namanyay-search-btn {
         background:#0099ff;
         color:white;
         font: 'trebuchet ms', trebuchet;
         padding:10px 20px;
         border-radius:0 5px 5px 0;
         -moz-border-radius:0 5px 5px 0;
         -webkit-border-radius:0 5px 5px 0;
         -o-border-radius:0 5px 5px 0;
         border:0 none;
         font-weight:bold;
         }
         #namanyay-search-box {
         background: #eee;
         padding:10px;
         border-radius:5px 0 0 5px;
         -moz-border-radius:5px 0 0 5px;
         -webkit-border-radius:5px 0 0 5px;
         -o-border-radius:5px 0 0 5px;
         border:0 none;
         width:160px;
         }
         body {
         text-align: center;
         padding: 200px;             
         padding: 0px;
         margin: 0px;
         background: #232946 !important;
         }
         #title {
         color: #fffffe;
         font-size: 50px;
         }
         #description {
         color: #b8c1ec !important;
         }
         .form-group label {
         color: #b8c1ec !important;
         }
         #survey-form .form-group #nameHelp,
         #survey-form .form-group #emailHelp {
         color: #a6aed4 !important;
         }
         #submit {
         background: #eebbc3;
         padding-left: 50px;
         padding-right: 50px;
         padding-top: 10px;
         padding-bottom: 10px;
         color: #232946;
         }
         #submit:hover {
         background: #be969c;
         color: white;
         }
         #title svg {
         height: 70px;
         margin-top: -20px;
         }
         .form-check {
         margin: 5px;
         }
         .form-check label {
         color: #a6aed4 !important;
         font-size: 16px;
         }
         #askQuestion {
         color: #b8c1ec !important;
         }
         #submit svg {
         height: 24px;
         padding-left: 4px;
         padding-bottom: 2px;
         transition: all 0.2s ease;
         }
         #submit:hover svg {
         transform: scale(1.1);
         color: white !important;
         }
      </style>
   </head>
   <body>

<!--*****************************************************************************-->
<?php
header('Content-type: text/html; charset=utf-8');

include "../config/db_connect.php";



$placa = strtolower ($_POST['buscaplaca']);

        $query = $conn->prepare("SELECT COUNT(placa) FROM encontradas WHERE placa= '".$placa."' " );
                        $query->execute();
                        $query->bind_result($tables);
                        while( $query->fetch()){
                                $banderaPlacaExiste = $tables;
                        }
       
if($banderaPlacaExiste == 0)
{
    $mensajefinalizacion= "La Placa ".$placa." no existe en los registros cargados por usuarios de la plataforma, intenta más adelante";   
    
}
if($banderaPlacaExiste >0)        
    {
    $mensajefinalizacion= "La Placa ".$placa." esta en los registros cargados por usuarios de la plataforma";       
    
    $buscaplaca = ("SELECT placa, estado_pertenece, estado_encontrada, fecha_encontrada, nombre, telefono, imagen FROM encontradas WHERE placa= '".$placa."'"); 
            echo "<table border='3'>            
            <tr>
            <th>Placa</th>
            <th>Estado al que pertenece</th>
            <th>Estado donde se encuentra</th>
            <th>Fecha encontrada</th>
            <th>Nombre de quien la encuentra</th>
            <th>Teléfono para Contacto</th>
            <th>Fotografia</th>
            </tr>";
    if ($result = mysqli_query($conn, $buscaplaca)){
         while($row = $result->fetch_assoc()){
                                 
             echo "<td>".$row['placa']."</td>";
             echo "<td>".$row['estado_pertenece']."</td>";
             echo "<td>".$row['estado_encontrada']."</td>";
             echo "<td>".$row['fecha_encontrada']."</td>";
             echo "<td>".$row['nombre']."</td>";
             echo "<td>".$row['telefono']."</td>";                         
             echo "<td>".'<img height="300" width="300" src="data:image/jpeg;base64,'.base64_encode($row['imagen']).'"/>'."</td>";
            }
        }     
    }
    
?>
<!--*****************************************************************************-->
   </body>
</html>
