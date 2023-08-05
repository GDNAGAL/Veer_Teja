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
  <!-- Custom Css  -->
  <link rel="stylesheet" href="custom/style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
   <!-- Select2 -->
<link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
 <!-- Date Picker -->
 <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">  
<!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
  input[data-provide="datepicker"],input[type="time"]{
    width:100%;
    margin-bottom:10px;
    padding:5px;
  }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php require("includes/header.php");

$genral = mysqli_query($conn, "SELECT * FROM `genral` where `Id`=1");
$gentalrows=mysqli_fetch_assoc($genral);
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content-header">
      <h1>
        Settings
      </h1>

    </section>
    <!-- Main content -->
    <section class="content">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Profile</a></li>
              <li><a href="#tab_2" data-toggle="tab">Draw And Account Details</a></li>
              <li><a href="#tab_3" data-toggle="tab">Change Username & Password</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>How to use:</b>

                <p>Exactly like the original bootstrap tabs except you should use
                  the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                A wonderful serenity has taken possession of my entire soul,
                like these sweet mornings of spring which I enjoy with my whole heart.
                I am alone, and feel the charm of existence in this spot,
                which was created for the bliss of souls like mine. I am so happy,
                my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                that I neglect my talents. I should be incapable of drawing a single stroke
                at the present moment; and yet I feel that I never was a greater artist than now.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane row" id="tab_2">
              <div class="col-md-6">
              <!-- Profile Image -->
              <div class="box box-primary" style='background:#e6f0ff'>
                <div class="box-body box-profile">
                  <h3 class="profile-username">Scroll Text</h3>
                  <form method="post" id="scrolltextform">
                <textarea name="scrolltext" value="" id="stext" style="width:100%;resize: vertical;" cols="30" rows="17">
                  <?php echo $gentalrows['marquee']; ?>
                </textarea>
                <button type="submit" id="uscrolltextbtn"  name="uscrolltextbtn" class="btn btn-primary btn-block"><b>Update</b></button>
                </form>  
              </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
              </div>
              <div class="col-md-6">

               <!-- Profile Image -->
               <div class="box box-primary" style='background:#e6f0ff'>
                <div class="box-body box-profile">
                  <h3 class="profile-username">Draw Closing Date :</h3>
                  <form method="post" id="closedateform" autocomplete="off">
                  <p>Current Close Date : <b><?php echo $gentalrows['closedate'];?></b></p>
                  <input data-provide="datepicker" placeholder="Booking Close Date" name="bookingclosedate" required>
                  <input type="time" name="closetime" required>
                  <button type="submit" id="closedatebtn"  name="closedatebtn" class="btn btn-primary btn-block"><b>Update</b></button>
                </form> 
              </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

              <!-- Profile Image -->
              <div class="box box-primary" style='background:#e6f0ff'>
                <div class="box-body box-profile">
                  <h3 class="profile-username">Payment Details :</h3>
                  <form action="getData/form_submit.php" method="POST"  autocomplete="off" enctype="multipart/form-data">
                  <div class="form-group">
                <label>QR Code :</label>
                <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg" name="qr" required>
              </div>
              <div class="form-group">
                <label>UPI ID :</label>
                <input type="text" class="form-control" value="<?php echo $gentalrows['upi'];?>" placeholder="Enter UPI ID" name="upi" required>
              </div>
                  <button type="submit"  name="updatepaymentdetails" class="btn btn-primary btn-block"><b>Update</b></button>
                </form>
              </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

              </div>
              <!-- /.col -->
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
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
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>

<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="custom/data.js"></script>
<script>
  $(document).ready(function(){
    $('.datepicker').datepicker();
    $('#stext').val(function(i,v){
        return v.replace(/\s+/g,' ').replace(/>(\s)</g,'>\n<');
    });
})
</script>

</body>
</html>
