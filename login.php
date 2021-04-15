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

 <form class="login" action="" method="post">
   <div class="">
     <input type="text" name="email"  class="email" value="" required>
   </div>
   <div class="">
     <input type="password" name="password"  class="password" value="" required>
   </div>
   <div class="">
     <button type="submit" name="submit"  class="submit">submit</button>
   </div>
 </form>
 <?php

   include 'includes/footer.php';
  ?>
 <script type="text/javascript">

   $(function(e){
     $('form.login').on('submit', (function(e){
       e.preventDefault();
       login($('.email').val(), $('.password').val(), $('.submit'));
     }));
   });

 </script>
