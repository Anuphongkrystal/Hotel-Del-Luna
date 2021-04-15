function login(getEmail,getPass){

$.ajax({
    url: DIR+"/requests/login-request.php",
    method:"POST",
    dataType: "json",
    data: {
      email:getEmail,
      password:getPass
    },
    success: function(data){
      console.log(data.msg);
      if(data.msg == "เข้าสู่ระบบสำเร็จ"){
        setTimeout(function(e){
          window.location.href = DIR+"/";
        }, 1000);
      }
    },
    /*
    error: function(data) {
        console.log(data.msg);
      window.location.href = DIR+"/";
    }
    */

  });

}
