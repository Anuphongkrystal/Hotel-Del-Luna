<?php

  session_start();
  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    include_once '../config/class/config.php';
    include '../config/class/login.class.php';
    include '../config/class/random.class.php';

      $login = new LoginClass;
      $random = new random;

      $ip = $random->getIP();

     if(isset($_POST['email']) && isset($_POST['password'])){

          $email = trim(preg_replace("#(https:\/\/|http:/\/\|www.)#i", "",$_POST['email']));
          $password = trim($_POST['password']);
          $ip = trim(preg_replace("#[^0-9]#","",$ip));
          $check = $login->LOGIN($email,$password,$ip);
          $check;
          $message = array("msg"=>$check);
          echo json_encode($message);
      }

    

  }

 ?>
