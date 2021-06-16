<?php
header('Content-type: text/html; charset=utf-8');

include "../config/db_connect.php";



$placa = $_POST['placa'];
echo $placa;    
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
}
        


?>

<script type="text/javascript"> alert( "<?php echo $mensajefinalizacion; ?>" ); window.location.href="../index.html";</script>';
