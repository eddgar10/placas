<?php
//https://hub.docker.com/r/tomsik68/xampp/ | migrar a docker y despues a AWS para tenerlo en linea
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "placas"; //$_POST['namebd'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
printf("Connect failed: %sn", mysqli_connect_error());
exit();
}
?>
