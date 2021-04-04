<?php

  class LoginClass{
    protected $db;
    protected $DIR;

    public function __construct(){
      $db = connect::_DB();
      $DIR = connect::$DIR;
      $this->db = $db;
      $this->DIR = $DIR;
    }

    public function SIGNUP($fname,$lname,$email,$password,$tel,$ip){
        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $equery = $this->db->prepare("SELECT member_id FROM tb_member WHERE email = :email");
        $equery->execute(array(":email"=>$email));

        if(($fname || $lname||$email||$password) == ""){
            return "ข้อมูลไม่ครบถ้วน";
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)==true){
            return "อีเมล์ไม่ถูกต้อง";
        }else if($equery->rowCount()>0){
            return "อีเมล์มีอยู่แล้ว";
        }else{

          $query = $this->db->prepare("INSERT INTO tb_member(first_name,last_name,email,password,tel,ip,date_created)
                                      VALUES (:first_name,:last_name,:email,:password,:tel,:ip,now())");
          $query->execute(array(":first_name"=>$fname,
                                ":last_name"=>$lname,
                                ":email"=>$email,
                                ":password"=>$password_hash,
                                ":tel"=>$tel,
                                ":ip"=>$ip));
      }
      if($query){
          return "สำเร็จ";
      }

    }
  }

 ?>
