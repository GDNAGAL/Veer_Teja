<?php
include("veerTejaAdmin/includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>जय वीर तेजा लक्की ड्रा, नागौर || Jai Veer Teja Lucky Draw</title>
    <meta name="description" content="Some tags are vital for SEO. Others have little or no impact on rankings. Here's every type of meta tag you need to know about.The purpose of a meta description is to reflect the essence of a page, but with more details and context."/>
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
                        <div class='ticket-booking-btn'>
                          <a href='bookingDetails'>Book Ticket ( टिकट ख़रीदे )</a>
                        </div>
        
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
        <div class="product-card">
          <form>
            <fieldset>
              <legend>अपना टिकट नं. वेरीफाई करें </legend>
          
              <input type="text" placeholder="अपना मोबाइल नंबर दर्ज करें ">
              <button>Verify Ticket</button>
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
</section>

<!--  -->




    
   </main>
 <?php require("includes/footer.php"); ?>


    <script src="./asset/js/bottom-nav.js"></script>
</body>
</html>