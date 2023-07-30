<?php
$off = $_GET['off'];

if($off=="" || $off == null){
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
   <section class="bookingdetails-section">

    <div class="container mt-3">
        <div class="row">

            <div class="col-12">
                <p class="booktoken">टोकन बुक करने के लिए अपनी जानकारी भरें :--</p>
                <form action="" autocomplete="off">
                    <div class="mb-3">
                        <input type="name" class="form-control" id="" placeholder="Full Name" name="fullname" required>
                      </div>
                      <div class="mb-3">
                        <input type="name" class="form-control" id="" placeholder="Father Name" name="fathername" required>
                      </div>
                      <div class="mb-3">
                        <input type="number" class="form-control" id="" placeholder="Mobile No." name="mobile" required>
                      </div>
                      <div class="mb-3">
                        <select name="" id="" class="form-control" name="district" required>
                            <option value="">Select District</option>
                            <option>Ajmer (अजमेर)</option>
                            <option>Banswara (बाँसवाड़ा)</option>
                            <option>Alwar (अलवर)</option>
                            <option>Baran (बारां)</option>
                            <option>Barmer (बाड़मेर)</option>
                            <option>Bharatpur (भरतपुर)</option>
                            <option>Bhilwara (भीलवाड़ा)</option>
                            <option>Bikaner (बीकानेर)</option>
                            <option>Bundi(बूँदी)</option>
                            <option>Chittorgarh (चित्तौड़गढ़)</option>
                            <option>Churu (चूरू)</option>
                            <option>Dausa (दौसा)</option>
                            <option>Dholpur (धौलपुर)</option>
                            <option>Dungarpur (डूंगरपुर)</option>
                            <option>Hanumangarh (हनुमानगढ़)</option>
                            <option>Jaipur (जयपुर)</option>
                            <option>Jaisalmer (जैसलमेर)</option>
                            <option>Jalore (जालौर)</option>
                            <option>Jhalawar (झालावाड़)</option>
                            <option>Jhunjhunu (झुन्झुनू)</option>
                            <option>Jodhpur (जोधपुर)</option>
                            <option>Karauli (करौली)</option>
                            <option>Kota (कोटा)</option>
                            <option>Nagaur (नागौर)</option>
                            <option>Pali (पाली)</option>
                            <option>Pratapgarh (प्रतापगढ़)</option>
                            <option>Rajsamand (राजसमंद)</option>
                            <option>Sawai Madhopur (सवाई माधोपुर)</option>
                            <option>Sikar (सीकर)</option>
                            <option>Sirohi (सिरोही)</option>
                            <option>Sri Ganganagar (श्री गंगानगर)</option>
                            <option>Tonk (टोंक)</option>
                            <option>Udaipur (उदयपुर)</option>  
                        </select>
                      </div>
                      <div class="payment-box">
                    <h3>Pay <span style='color:#EF194C'>Rs 399</span></h3>
                    <div class="border rounded-4 p-2 d-flex justify-content-center">
                    <img src="./asset/img/qr.png" alt=""  width="100px" height="100px">
                    <div class="justify-content-center m-4">
                    <input style='text-transform:lowercase; margin:0px;' class="form-control" type="text" value="9001881117@ybl" readonly>
                    <button type="button" class='copy'>Copy UPI Id</button>
                    </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="name" class="form-control" id="" placeholder="Enter Transaction No." name="trno" required>
                    </div>
                    <div class="mb-3 mt-3">
                    <input id="checkbox" type="checkbox" style="margin-left:10px"/>
                    <label for="checkbox"> I agree to these <a href="#">Terms and Conditions</a>.</label>
                    </div>

                </div>
                      <a href="payment.htm" ><button class="save">Book Now</button></a>

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