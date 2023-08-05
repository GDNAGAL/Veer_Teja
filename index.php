<?php
include("veerTejaAdmin/includes/connection.php");
$genral = mysqli_query($conn, "SELECT * FROM `genral` where `Id`=1");
$genralrows=mysqli_fetch_assoc($genral);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>जय वीर तेजा लक्की ड्रा, नागौर || Jai Veer Teja Lucky Draw</title>
    <meta name="keywords" content="Jai Veer Teja, Veer Teja, Lucky Draw, Jai Veer Teja Lucky Draw, Nagour,Bikaner">
    <meta name="description" content=""/>
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

</head>
<body>

<?php require("includes/header.php"); ?>
<main>
  <section class="hero-section">
    <div class="container">
      <div class="row">
        <input type="hidden" value="<?php echo $genralrows['closedate']; ?>" id="closedate">
          <marquee behavior="" direction=""><?php echo $genralrows['marquee']; ?></marquee>
        <?php
                  $sql= mysqli_query($conn, "SELECT * FROM `tbl_token_offer`");
                  while($row=mysqli_fetch_assoc($sql)){
                    echo "<div class='col-12 col-md-6 col-lg-4'>
                    <div class='product-card'>
                      <div class='product-tumb'>
                        <img src='veerTejaAdmin/dist/banner/$row[image]' alt='' height='300px' width='100%'>
                      </div>
                      <div class='product-details'>
                        <span class='product-catagory' id='timer'></span>
                        <h4> ₹ $row[price]/- </h4>
                        <p>$row[text]</p>
                        <form method='GET' action='bookingDetails.php'>
                        <input type='hidden' id='oid' value='$row[Id]' name='oid' required>
                        <div id='bookbtn'></div>
                        </form>
                      </div>
                    </div>
                  </div>";
                  }
        ?>
          </div>
        </div>
      </div>
    </section>

<!-- timer section -->

    <!-- <section class="timer-section">
      <div class="container mb-3">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="timer" id="timer">

            </div>
          </div>
          
        </div>
      </div>
    </section> -->

<!-- timer section -->

<!--  -->

<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="product-card">
          <img src="./asset/img/lucky.jpg" alt="" class="img-fluid">
         
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4 verify-ticket">
        <div class="product-card" style='height:auto;'>
              <iframe width="100%" height="400px" src="https://www.youtube.com/embed/Gbxiqswz1hA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
         
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
</section>

<!--  -->
<footer>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="social-link">
             <a href="https://www.facebook.com/profile.php?id=100095074703306"><i class="fa-brands fa-facebook"></i></a>
             <a href="https://www.instagram.com/veer_teja_lucky_draw/"><i class="fa-brands fa-instagram"></i></a>
             <a href="#"><i class="fa-brands fa-twitter"></i></a>
             <a href="https://wa.me/918619372377" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>
      </div>

    </footer>



    
   </main>
 <?php require("includes/footer.php"); ?>


    <script src="./asset/js/bottom-nav.js"></script>
</body>
</html>