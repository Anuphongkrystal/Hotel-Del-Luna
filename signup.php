<?php
  include 'config/declare.php';
  include 'config/classesGetter.php';
 ?>


  <?php
    $title = "สมัครสมาชิก";
    $keywords = "Hotel del luna,Single Double Triple Quad Queen King Twin Hollywood Twin Room Double-double Studio Suite/Executive Suite Mini Suite or Junior Suite President Suite/Presidential Suite
            Apartments/Room for Extended Stay Connecting rooms Murphy Room Accessible Room/Disabled Room Cabana Adjoining rooms Adjacent rooms Villa Executive Floor/Floored Room Smoking/Non-Smoking Room";
    $desc = "Hotel del luna,Single,Double,Triple,Quad,Queen,King,Twin,Hollywood Twin Room,Double-double,Studio,Suite/Executive Suite,Mini Suite or Junior Suite,President Suite/Presidential Suite
            Apartments/Room for Extended Stay,Connecting rooms,Murphy Room,Accessible Room/Disabled Room,Cabana,Adjoining rooms,Adjacent rooms,Villa,Executive Floor/Floored Room,Smoking/Non-Smoking Room
    ";
  ?>

<?php
  include 'includes/header.php';
 ?>



<form class="" id="" action="" method="post">
  <div class="">
    <input type="text" name="fname" id="fname" class="fname" value=""  placeholder="ชื่อ"   maxlength="30" required>
  </div>
  <div class="">
    <input type="text" name="lname" id="lname" class="lname" value="" placeholder="นามสกุล" maxlength="30" required>
  </div>
  <div class="">
    <input type="email" name="email" id="email" class="email" value="" placeholder="อีเมล์" maxlength="150" required>
  </div>
  <div class="">
    <input type="password" name="password" id="password" class="password" value="" placeholder="**********" required>
  </div>
  <div class="">
    <input type="text" name="tel" id="tel" class="tel" value="" placeholder="เบอร์โทรติดต่อ" required>
  </div>
  <div class="">
    <button type="submit" name="submitForm" class="submitForm">Submit</button>
    <button type="reset" name="reset">รีเซต</button>
  </div>
</form>


<?php include 'includes/footer.php'; ?>

<script type="text/javascript">
  $(function(){


    $('form').on('submit', (function(e){
      e.preventDefault();

      $('.submitForm').prop('disabled', true);
      $('.overlay-2').show();
      var fname = $('.fname').val();
      var lname = $('.lname').val();
      var email = $('.email').val();
      var password = $('.password').val();
      var tel = $('.tel').val();

      console.log(email);

      $.ajax({
        url: DIR+"/requests/signup-requests.php",
        method: 'POST',
        cache: false,
        data: {
          fname: fname,
          lname: lname,
          email: email,
          password: password,
          tel: tel
        },
        success: function(data){
          console.log(data);
          if (data == "สำเร็จ") {
            window.location.href = DIR+"/index";
          }
        }
      });
    }));
  });
</script>
