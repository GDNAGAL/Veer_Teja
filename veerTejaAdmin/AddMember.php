<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <link rel="icon" type="icon" sizes="16x16" href="icons/favicon.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
   <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
    input[type="text"]{
  text-transform: capitalize !important;
}

  input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php require("includes/header.php")?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content-header">
      <h1>
        Member 
        <small>Add New Member</small>
      </h1>
      
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
            <!-- /.box-header -->
            <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Basic Information</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form method="post" id="addmember" autocomplete="off">
            <div class="col-md-6">
              <div class="form-group">
                <label>Member Name :</label>
                <input type="text" class="form-control" placeholder="Enter Member Name" name="membername" required>
              </div>
              <div class="form-group">
                <label>Father Name :</label>
                <input type="text" class="form-control"  placeholder="Enter Father Name" name="fathername" required>
              </div>
              <div class="form-group">
                <label>Mobile :</label>
                <input type="number" class="form-control"  placeholder="Enter Mobile No." name="mobile" required>
              </div>
                <div class="form-group">
                <label>District :</label>
                <select class="form-control" style="width: 100%;" name="district" required>
                  <option selected="selected" value="">Select District</option>
                  <option>Ajmer (अजमेर)</option>
                  <option>Alwar (अलवर)</option>
                  <option>Banswara (बाँसवाड़ा)</option>
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
              <!-- /.form-group -->
           </div>
            <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Select Agent :</label>
                <select class="form-control" id="selectclass" style="width: 100%;" name="agents" required>
                  <option selected="selected" value="0">No Agent</option>
                  <?php
                  $sql= mysqli_query($conn, "SELECT * FROM `agents`");
                  while($row=mysqli_fetch_assoc($sql)){
                    echo "<option value='$row[id]'>$row[agent_name]</option>";
                  }
                  ?>
                </select>
              </div>
              <!-- /.form-group -->
              
              <div class="form-group">
                <label>Select ID Type :</label>
                <select class="form-control" style="width: 100%;" name="idtype" >
                  <option selected="selected" value="">Select ID Type</option>
                  <option>Aadhar Card</option>
                  <option>PAN Card</option>
                  <option>Driving Licence</option>
                </select>
              </div>
              <div class="form-group">
                <label>ID Number :</label>
                <input type="text" class="form-control" placeholder="Enter ID Number" name="idno">
              </div>
              <div class="form-group">
                <label>Select Offer :</label>
                <select class="form-control" style="width: 100%;" name="offerchoose" id="offerchoose" required>
                  <option selected="selected" value="">Select Offer</option>
                  <?php
                  $sql= mysqli_query($conn, "SELECT * FROM `tbl_token_offer`");
                  while($row=mysqli_fetch_assoc($sql)){
                    echo "<option value='$row[Id]'>Buy $row[buy] - Get $row[free] Free - $row[price]</option>";
                  }
                  ?>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">

              <div class="col-md-6" style='display:flex'>
                  <button class="btn btn-flat btn-success" name="addmember">Save Information</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <strong style='padding-top:4px; font-size:20px' id='total'></strong>
                </div>
            </div>
         </form>
        </div>
        <!-- /.box-body -->
      </div>
            
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php //require("includes/footer.php");?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="custom/data.js"></script>
<!-- page script -->
<script>
  $("#offerchoose").change(function(){
    let price = $("#offerchoose option:selected" ).text().split("-");
    
  // convert to indian currency
   const toIndianCurrency = (num) => {
   const curr = num.toLocaleString('en-IN', {
      style: 'currency',
      currency: 'INR'
   });
   return curr;
};
    //alert(price.split("-"))
    $("#total").html(toIndianCurrency(Number(price[2])));
  })
</script>
</body>
</html>
