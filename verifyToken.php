<?php
include("includes/footer.php");
error_reporting(0);
$mobile = $_GET['mobile'];

if($mobile == "" || $mobile == null){
  $resp = "";
}else{
  include("veerTejaAdmin/includes/connection.php");
  $member = mysqli_query($conn, "SELECT * FROM `tbl_members` where `mobile`='$mobile'");
  $memberrows=mysqli_fetch_assoc($member);
  $mr = mysqli_num_rows($member);
  $memberid = $memberrows['id'];
  if($mr==0){
  $tokenreq = mysqli_query($conn, "SELECT * FROM `tbl_token_request` where `mobile`='$mobile'");
  $tokenreqrows=mysqli_fetch_assoc($tokenreq);
  $reqnum = mysqli_num_rows($tokenreq);
  if($reqnum==0){
    $resp = "<div style='margin-top:40px; padding-top:0px'>
    <div class='mb-4 text-center' style='margin-top:0px'>
    <img src='asset/img/cross.png' width='75' height='75'>
   </div>
    <div class='text-center'>
        <h1>No Record Found !</h1>
        </div>
  </div>";
  }elseif($tokenreqrows['status']==0){
    $resp = "<div style='margin-top:40px; padding-top:0px'>
    <div class='mb-4 text-center' style='margin-top:0px'>
    <img src='asset/img/warning.png' width='75' height='75'>
   </div>
    <div class='text-center'>
        <h1>Payment Verification Pending</h1>
        <p style='line-height:35px'>आपका पेमेंट वेरिफिकेशन अभी पूरा नहीं हुआ है <br> कृपया कुछ समय इंतजार करे या फिर नीचे दिए गये हेल्पलाइन नं. पर सम्पर्क करे <br> <b>हेल्पलाइन नं. +91 8619372377, +91 8890903715</b></p>
    </div>
  </div>";
  }elseif($tokenreqrows['status']==2){
    $resp = "<div style='margin-top:40px; padding-top:0px'>
    <div class='mb-4 text-center' style='margin-top:0px'>
    <img src='asset/img/reject.png' width='75' height='75'>
   </div>
    <div class='text-center'>
        <h1>Your Request Rejected !</h1>
        </div>
  </div>";
  }
  }else{
  $tokens = mysqli_query($conn, "SELECT * FROM `tbl_tokens` where `member_id`='$memberid'");
  $tokennumrow = mysqli_num_rows($tokens);
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>जय वीर तेजा लक्की ड्रा, नागौर || Jai Veer Teja Lucky Draw</title>
     
    <!-- bootstrap include -->
    <link rel="stylesheet" href="./asset/css/bootstrap.css">
    <link rel="stylesheet" href="./asset/css/design.css">
    <link rel="stylesheet" href="./asset/css/mediasScreen.css">

    <!-- font awesome link-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Javascript include -->
    <script src="./asset/js/bootstrap.bundle.js"></script>
    <script src="./asset/js/bootstrap.esm.js.map"></script>
 <style>
  input{
    text-transform: capitalize;
    border:1px solid #EF194C !important;
  }
  .paid{
    background-color:#343148FF;
    color:white;
  }
  .free{
    background-color:#D7C49EFF;
    color:#343148FF !important;
  }
  .paidct{
    background:#ACE1AF !important;
    color:green;
    font-size:12px;
    padding:1px 10px;
    padding-top:3px;
    border-radius:5px;

  }
  .freect{
    background:#ffbfbf !important;
    color:red;
    font-size:12px;
    padding:1px 10px;
    padding-top:3px;
    border-radius:5px;
  }
 </style>
</head>
<body>

<?php require("includes/header.php"); ?>

<main>
<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4 verify-ticket">
        <div class="">
          <form method="get" autocomplete="off">
            <fieldset>
              <legend>अपने टोकन की जानकारी प्राप्त करे </legend>
          
              <input type="number" placeholder="अपना मोबाइल नंबर दर्ज करें " value="<?php echo $mobile; ?>" name="mobile" required>
              <button type="submit">Verify Token</button>
            </fieldset>
          </form>
          <!-- <h4>टिकट कैसे ख़रीदे!</h4>
          <video class="w-100 mt-2 mb-2" controls>
            <source src="movie.mp4" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
          </video>
          -->
        </div>
      </div>
    </div>
  </div>
  <h1 style='margin-left:6%; margin-bottom:0px; color:#EF194C; font-size:18px'>Token Status (<?php echo $tokennumrow; ?>) :</h1><hr style='width:90%; margin-left:5%;'>
      <div class="tcnt">
        <?php 
      echo $resp;
        while($tokenrow=mysqli_fetch_assoc($tokens)) {
          if($tokenrow['type']=="PAID"){
            $cl = "paid";
            $ct ="freect";
            $tx = "PAID";
          }else{
            $cl = "free";
            $ct = "paidct";
            $tx = "FREE";
          }
          echo "<div class='token-card $cl'>
          <div class='head'>Token No. : $tokenrow[token_no] <span class='$ct' style='float:right'>$tx</span></div>
          <div class='cnt'>
            <div class='imgcnt'>
            <img src='asset/img/v2.png'  width='110%' height='100%' style='background:white;'>
            </div>
            <div class='detal'>
              Name : $memberrows[member_name]<br>
              Mobile : $memberrows[mobile]<br>
              City : $memberrows[district]
            </div>
          </div>
        </div>";
        }
        ?>
          
        </div>
        <br><br><br><br>
</section>
</main> 


<?php //include("includes/footer.php"); ?>
<script src="./asset/js/bottom-nav.js"></script>
</body>
</html>