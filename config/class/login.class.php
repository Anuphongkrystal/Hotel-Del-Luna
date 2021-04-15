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


    public function LOGIN($email,$password,$ip){
      if(($email || $password) == ""){
        return "อีเมล์ หรือ รหัสผ่านเป็นค่าว่าง";
      }else {
        $query = $this->db->prepare("SELECT email,password FROM tb_member WHERE email = :email ");
        $query->execute(array(":email"=> $email));
        if($query->rowCount() == 0){
          return "ข้อมูลไม่ถูกต้อง";
        }else {
          $row = $query->fetch(PDO::FETCH_OBJ);
          $pass = $row->password;

          if(password_verify($password,$pass)){
            $pquery = $this->db->prepare("SELECT member_id FROM tb_member WHERE email = :email AND password = :password LIMIT 1");
            $pquery->execute(array(":email"=>$email, "password"=>$pass));
            $prow = $pquery->fetch(PDO::FETCH_OBJ);
            $id = $prow->member_id;
            $iquery = $this->db->prepare("INSERT INTO tb_login(user_id,ip,login_time) VALUES(:id,:ip,now())");
            $iquery->execute(array(":id"=>$id,":ip"=>$ip));

            $_SESSION['id'] = $id;
            return "เข้าสู่ระบบสำเร็จ";
          }else{

          }
        }
      }
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
