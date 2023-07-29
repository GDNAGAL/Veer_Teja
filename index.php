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

    <header>
        <div class="container pt-1 pb-1">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="logo">
                        <a class="navbar-brand" href="#">
                                <img src="./asset/img/v2.png" alt="" width="120" height="120">
                            </a>
                            </div>
                </div>
               
            </div>
        </div>
        <nav class="navbar navbar-expand-lg d-none d-lg-block  ">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">होम</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">टिकट सत्यापित करें</a>
                </li>
              
                <li class="nav-item">
                  <a class="nav-link" href="#">हमारे बारे में</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">संपर्क</a>
                </li>
              </ul>
              
            </div>
          </div>
        </nav>
    </header>

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
                        <span class='product-catagory'>Booking Here</span>
                        <h4> ₹ $row[price]/- </h4>
                        <p>-------</p>
                        <div class='ticket-booking-btn'>
                          <a href='bookingDetails.htm'>Book Ticket ( टिकट ख़रीदे )</a>
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

    <section class="timer-section">
      <div class="container mb-3">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="timer" id="timer">

            </div>
          </div>
          
        </div>
      </div>
    </section>

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
          <h4>टिकट कैसे ख़रीदे!</h4>
          <video class="w-100 mt-2 mb-2" controls>
            <source src="movie.mp4" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
          </video>
         
        </div>
      </div>
    </div>
  </div>
</section>

<!--  -->




    <section class="d-block d-lg-none">

    <nav class="mobile-bottom-nav">
      <div class="mobile-bottom-nav__item mobile-bottom-nav__item--active">
        <div class="mobile-bottom-nav__item-content">
          <i class="material-icons">home</i>
          होम
        </div>		
      </div>
      <div class="mobile-bottom-nav__item">		
        <div class="mobile-bottom-nav__item-content">
          <i class="material-icons">mail</i>
          टिकट सत्यापित करें
        </div>
      </div>
      <div class="mobile-bottom-nav__item">
        <div class="mobile-bottom-nav__item-content">
          <i class="material-icons">person</i>
          हमारे बारे में
        </div>		
      </div>
      
      <div class="mobile-bottom-nav__item">
        <div class="mobile-bottom-nav__item-content">
          <i class="material-icons">phone</i>
          संपर्क
        </div>		
      </div>
    </nav> 
    </section>
   </main>

     
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="social-link">
             <a href="#"><i class="fa-brands fa-facebook"></i></a>
             <a href="#"><i class="fa-brands fa-instagram"></i></a>
             <a href="#"><i class="fa-brands fa-twitter"></i></a>
             <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>
      </div>

    </footer>


    <script src="./asset/js/bottom-nav.js"></script>
</body>
</html>