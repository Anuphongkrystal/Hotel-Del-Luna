<?php
  session_start();

  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {


    if(isset($_POST['fname']) &&
       isset($_POST['lname']) &&
       isset($_POST['email']) &&
       isset($_POST['password'])&&
       isset($_POST['tel'])){

        include_once '../config/class/config.php';
        include '../config/class/login.class.php';
        include '../config/class/random.class.php';
        $login = new LoginClass;
        $random = new random;

        $ip = $random->getIP();

        $fname = trim(preg_replace("#[<> ]#i", '', $_POST['fname']));
        $lname = trim(preg_replace("#[<> ]#i", '', $_POST['lname']));
        $emailTemp = trim(preg_replace("#[<> ]#i", '', $_POST['email']));
        $email = trim(preg_replace("#(https:\/\/|http:/\/\|www.)#i", "", $emailTemp));
        $password = trim($_POST['password']);
        $tel = trim(preg_replace("#[<> ]#i", '', $_POST['tel']));


        echo $login->SIGNUP($fname,$lname,$email,$password,$tel,$ip);

    }

  }


 ?>
