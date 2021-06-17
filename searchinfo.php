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
         background-color: #212531;
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

$placa = strtolower($_POST['buscaplaca']);

$query = $conn->prepare("SELECT COUNT(placa) FROM encontradas WHERE placa= '" . $placa . "' ");
$query->execute();
$query->bind_result($tables);
while ($query->fetch())
{
    $banderaPlacaExiste = $tables;
}

if ($banderaPlacaExiste == 0)
{
    $html_placa = "sin registro para " . $placa;
    $html_edo_pertenece = "sin registro para " . $placa;
    $html_edo_encontrada = "sin registro para " . $placa;
    $html_fecha_encontrada = "sin registro para " . $placa;
    $html_nombre = "sin registro para " . $placa;
    $html_telefono = "sin registro para " . $placa;

    echo '<script type="text/javascript">
            alert("No existe registro de esa placa");
            window.location.href="../index.html";
            </script>';

}
if ($banderaPlacaExiste > 0)
{    

    $buscaplaca = ("SELECT placa, estado_pertenece, estado_encontrada, fecha_encontrada, nombre, telefono, mensaje, imagen FROM encontradas WHERE placa= '".$placa."'");

    if ($result = mysqli_query($conn, $buscaplaca))
    {
        while ($row = $result->fetch_assoc())
        {
            $html_placa = $row['placa'];
            $html_edo_pertenece = $row['estado_pertenece'];
            $html_edo_encontrada = $row['estado_encontrada'];
            $html_fecha_encontrada = $row['fecha_encontrada'];
            $html_nombre = $row['nombre'];
            $html_telefono = $row['telefono'];
            $html_mensaje = $row['mensaje'];
            $html_foto_placa = '<img height="300" width="600" src="data:image/jpeg;base64,' . base64_encode($row['imagen']) . ' "/>';
        }
    }
}

?>

<!--*****************************************************************************-->
       <div class="container col-md-12">
       <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th scope="col">Placa</th>
              <th scope="col">Estado al que pertenece</th>
              <th scope="col">Estado Donde se encuentra</th>
              <th scope="col">Fecha encontrada</th>
              <th scope="col">Nombre de quien la encuentra</th>
              <th scope="col">Telefonno para contacto</th>
              <th scope="col">Mensaje</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><?php echo $html_placa ?></th>
              <td><?php echo $html_edo_pertenece ?></td>
              <td><?php echo $html_edo_encontrada ?></td>
              <td><?php echo $html_fecha_encontrada ?></td>
                <td><?php echo $html_nombre ?></td>
                <td><?php echo $html_telefono ?></td>                
                <td><?php echo $html_mensaje ?></td>
            </tr>    
          </tbody>
        </table>
    </div>
       <div class="container col-md-10">
   <?php echo $html_foto_placa ?>
        </div>
   </body>
</html>
