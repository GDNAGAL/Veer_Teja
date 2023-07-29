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
            <form action="" method="post" id="addstudentform" autocomplete="off">
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
                <select class="form-control" style="width: 100%;" name="district">
                  <option selected="selected" value="">Select District</option>
                  <option>Bikaner</option>
                  <option>Nagour</option>
                </select>
              </div>
              <!-- /.form-group -->
           </div>
            <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Select Agent :</label>
                <select class="form-control" id="selectclass" style="width: 100%;" name="studentclass" required>
                  <option selected="selected" value="">Select Agent</option>
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
                <select class="form-control" style="width: 100%;" name="gender" required>
                  <option selected="selected" value="">Select Gender</option>
                  <option>Aadhar Card</option>
                  <option>PAN Card</option>
                  <option>Driving Licence</option>
                </select>
              </div>
              <div class="form-group">
                <label>ID Number :</label>
                <input type="number" class="form-control" placeholder="Enter Mobile Number" name="mobile">
              </div>
              <div class="form-group">
                <label>Select Offer :</label>
                <select class="form-control" style="width: 100%;" name="studentclass" required>
                  <option selected="selected" value="">Select Offer</option>
                  <?php
                  $sql= mysqli_query($conn, "SELECT * FROM `agents`");
                  while($row=mysqli_fetch_assoc($sql)){
                    echo "<option value=''>$row[agent_name]</option>";
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

              <div class="col-md-6">
                  <button class="btn btn-flat btn-success" name="addstudent" id="addstudent">Save Information</button>
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

</body>
</html>
