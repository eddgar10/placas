<?php

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
