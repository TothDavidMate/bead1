<?php
session_start();
 ?>


<!DOCTYPE html>
<html>
<head>
  <title>Főoldal</title>
  <link rel="stylesheet" type="text/css" href="stilus.css">
</head>
  <body>

  <ul class="topnav">
  <li class="active"><a href="mainpage.php" >Főoldal</a></li>
  <li><a href="hirlap.php">Hírlap</a></li>
  <li><a href="adatbazisok.php">Adatbázisok</a></li>
  <li><a href="bank.php">Bank</a></li>
  <li><?php
if(isset($_SESSION['csaladnev'])){
  echo ("Bejelentkezett: " . "{$_SESSION['csaladnev']}"." "."{$_SESSION['utonev']}");

}
else{echo ' <a href=login.php>Belépés</a>';} 
  ?>

  </li>
  <?php if(isset($_SESSION['csaladnev'])){
    echo '<li> <a href="logout.php"> Kijelentkezés</a></li>';
  }
    
 ?> 
</ul>


</body>

</html>