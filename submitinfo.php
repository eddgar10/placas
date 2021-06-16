<?php
header('Content-type: text/html; charset=utf-8');

include "../config/db_connect.php";
//https://programacion.net/articulo/almacenar_y_recuperar_una_imagen_de_una_base_de_datos_mysql_mediante_php_1861



$placa =strtolower( $_POST['placa']);
$edo_pertenece = $_POST['edo_pert'];
$edo_encontrada = $_POST['edo_enc'];
$fecha_carga = date("Y-m-d");
$nombre = strtolower($_POST['nombre']);
$telefono = $_POST['telefono'];


if(isset($_POST["import_data"])){
    $check = getimagesize($_FILES["imagenplaca"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['imagenplaca']['tmp_name'];
        $imgplaca = addslashes(file_get_contents($image));
        
        
        $query = $conn->prepare("SELECT COUNT(placa) FROM encontradas WHERE placa= '".$placa."' " );
                        $query->execute();
                        $query->bind_result($tables);
                        while( $query->fetch()){
                                $banderaPlacaExiste = $tables;
                        }
        
if($banderaPlacaExiste == 0)
{
        //Insert image content into database
        $mysql_insert = "INSERT INTO encontradas (placa, estado_pertenece, estado_encontrada, imagen, fecha_encontrada, nombre, telefono, recuperada) VALUES ('".$placa."', '".$edo_pertenece."', '".$edo_encontrada."', '".$imgplaca."', '".$fecha_carga."', '".$nombre."', '".$telefono."', '0')";

        mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
    
        $mensajefinal= "El registro ha sido cargado a la lista de placas encontradas";
    }

if($banderaPlacaExiste > 0)
{
    $mensajefinal= "Ya existe un registro generado para la placa ".$placa;
}
        
        }
    }



?>

<script type="text/javascript"> alert( "<?php echo $mensajefinal ?>" ); window.location.href="../index.html";</script>';
