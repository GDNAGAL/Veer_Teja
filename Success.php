<?php
include("veerTejaAdmin/includes/connection.php");
$mobile = $_GET['mobile'];

if($mobile=="" || $mobile == null){
  header('Location:index');
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
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <!-- Javascript include -->
    <script src="./asset/js/bootstrap.bundle.js"></script>
    <script src="./asset/js/bootstrap.esm.js.map"></script>
 <style>
  input{
    text-transform: capitalize;
  }
 </style>
</head>
<body>

<?php require("includes/header.php"); ?>

<main>
<section>
  <div class="container">
  <div class="d-flex justify-content-center align-items-center" style='padding-top:0px'>
            <div style='margin-top:40px; padding-top:0px'>
                <div class="mb-4 text-center" style='margin-top:0px'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                        fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                </div>
                <div class="text-center">
                    <h1>Thank You !</h1>
                    <p>We've send the link to your inbox. Lorem ipsum dolor sit, </p>
                    <a href="index"><button class="btn btn-primary">Back Home</button></a>
                </div>
            </div>
  </div>
</section>
</main>

     
   <?php require("includes/footer.php"); ?>


    <script src="./asset/js/bottom-nav.js"></script>
    <script type="text/javascript">
window.onload = function () {
    if (typeof history.pushState === "function") {
        history.pushState("jibberish", null, null);
        window.onpopstate = function () {
            history.pushState('newjibberish', null, null);           
        };
    }
    else {
        var ignoreHashChange = true;
        window.onhashchange = function () {
            if (!ignoreHashChange) {
                ignoreHashChange = true;
                window.location.hash = Math.random();                
            }
            else {
                ignoreHashChange = false;   
            }
        };
    }
};

</script>
</body>
</html>