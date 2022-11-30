<?php
include_once'config.php';
$csalad= $_POST['csalad'];
$uto= $_POST['uto'];
$jelszo=$_POST['jelszo'];
$sql= "INSERT INTO users(csaladnev,utonev,jelszo) VALUES ('$csalad','$uto','$jelszo');";
mysqli_query($conn,$sql);
header("Location: belepes.php");
?>