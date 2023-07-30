<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>जय वीर तेजा लक्की ड्रा, नागौर</title>
     
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
   <section class="bookingdetails-section">

    <div class="container mt-3">
        <div class="row">

            <div class="col-12">
                <p class="heading">Ticket Booking Details</p>
                <form action="">
                    <div class="mb-3">
                        <input type="name" class="form-control" id="" placeholder="Full Name" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <input type="name" class="form-control" id="" placeholder="Father Name" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <select name="" id="" class="form-control" >
                            <option value="">Select District</option>
                            <option value="">Bikaner</option>
                            <option value="">Sikar</option>
                            <option value="">Jaipur</option>
                            <option value="">Jodhpur</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <input type="mobile" class="form-control" id="" placeholder="Mobile No." aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <input type="number" class="form-control" id="" placeholder="Pan Card Number" aria-describedby="emailHelp">
                      </div>
                  
                      <a href="payment.htm" class="save">Save & Continue</a>

                </form>
            </div>

            </div>
            </div>

            

   </section>

   </main>

     
   <?php require("includes/footer.php"); ?>


    <script src="./asset/js/bottom-nav.js"></script>
</body>
</html>