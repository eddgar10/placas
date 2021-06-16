<?php
header('Content-type: text/html; charset=utf-8');

include "../config/db_connect.php";
//https://programacion.net/articulo/almacenar_y_recuperar_una_imagen_de_una_base_de_datos_mysql_mediante_php_1861



$placa = $_POST['placa'];
$edo_pertenece = $_POST['edo_pert'];
$edo_encontrada = $_POST['edo_enc'];
$fecha_carga = date("Y-m-d");
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];


if(isset($_POST["import_data"])){
    $check = getimagesize($_FILES["imagenplaca"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['imagenplaca']['tmp_name'];
        $imgplaca = addslashes(file_get_contents($image));
        
        //Insert image content into database
        $mysql_insert = "INSERT INTO encontradas (placa, estado_pertenece, estado_encontrada, imagen, fecha_encontrada, nombre, telefono, recuperada) VALUES ('".$placa."', '".$edo_pertenece."', '".$edo_encontrada."', '".$imgplaca."', '".$fecha_carga."', '".$nombre."', '".$telefono."', '0')";

        mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));            
}
}

?>

<script type="text/javascript"> alert( "<?php echo " Registros guardado "; ?>" ); window.location.href="../index.html";</script>';
