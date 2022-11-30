<?php 



include "config.php";

if (isset($_POST['csalad']) && isset($_POST['uto']) && isset($_POST['jelszo'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }
    $csaladnev = validate($_POST['csalad']);
   
    $utonev = validate($_POST['uto']);

    $jelszo = validate($_POST['jelszo']);

    if (empty($csaladnev)) {

        header("Location: login.php?error=A Családnév hiányzik");

        exit();

    }else if(empty($utonev)){

        header("Location: login.php?error=Az utónév hiányzik");

        exit();
    }else if(empty($jelszo)){

        header("Location: login.php?error=A jelszo hianyzik");

        exit();
    }else{

        $sql = "SELECT * FROM users WHERE csaladnev='$csaladnev' AND utonev='$utonev' AND jelszo='$jelszo'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['csaladnev'] === $csaladnev && $row['utonev'] === $utonev && $row['jelszo'] === $jelszo) {

                session_start();

                echo "Sikeres Bejelentkezés!";

                $_SESSION['csaladnev'] = $row['csaladnev'];

                $_SESSION['utonev'] = $row['utonev'];

                $_SESSION['jelszo'] = $row['jelszo'];

                header("Location: mainpage.php");
                exit();

            }else{

                header("Location: login.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: login.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: mainpage.php");

    exit();

}
          
