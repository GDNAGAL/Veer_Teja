<?php

$orderid = $_GET['orderid'];
error_reporting(0);


include("includes/connection.php");
$sql = mysqli_query($conn, "SELECT * FROM `tbl_token_request` where `Id`='$orderid'");
$rows=mysqli_fetch_assoc($sql);
$r = mysqli_num_rows($sql);
if($orderid=="" || $orderid == null || $r == 0){
  header("location:index");
}
if($rows['status']==0){
  $status = "<span class='label label-warning'>Pending</span>";
  $action = "";
  $abtn="<a href='getData/reject.php?orderid=$orderid'><button type='button' class='btn btn-flat btn-danger' id='reject' name='reject'>Reject</button></a>";
}elseif($rows['status']==1){
  $status = "<span class='label label-success'>Approved</span>";
  $action = "display:none";
  $abtn="";
}elseif($rows['status']==2){
  $status = "<span class='label label-danger'>Rejected</span>";
  $abtn ="<a href='getData/reject.php?unorderid=$orderid'><button type='button' class='btn btn-flat btn-primary' id='reject' name='reject'>UNDO Reject</button></a>";
  $action = "display:none";
}

$memberrow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id` FROM `tbl_members` where `mobile`=$rows[mobile]"));
if($memberrow['id']==""){
  $memberid=0;
}else{
  $memberid = $memberrow['id'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
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
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
  td{
    height:auto;
    vertical-align: middle !important;
    text-transform:capitalize;
  }
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php require("includes/header.php")
  //error_reporting(0);
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order Review
        <!-- <small>Control panel</small> -->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-info">
        <img class="profile-user-img img-responsive img-circle" src="dist/img/avatar5.png" alt="User profile picture">

        <h3 class="profile-username text-center text-capitalize"><?php echo $rows['member_name']; ?></h3>

        <p class="text-muted text-center">Veer Teja Member</p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Father Name</b> <a class="pull-right text-capitalize"><?php echo $rows['father_name']; ?></a>
          </li>
          <li class="list-group-item">
            <b>Mobile</b> <a class="pull-right"><?php echo $rows['mobile']; ?></a>
          </li>
          <li class="list-group-item">
            <b>Email Id</b> <a class="pull-right"><?php echo $rows['email']; ?></a>
          </li>
          <li class="list-group-item">
            <b>District</b> <a class="pull-right text-capitalize"><?php echo $rows['district']; ?></a>
          </li>
        </ul>

        <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <!-- TABLE: LATEST ORDERS -->
 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Order Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Transaction Id</th>
                    <th>Time</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th class='text-center'>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $rows['Id']+2000;?></td>
                      <td><?php echo $rows['refno']; ?></td>
                      <td><?php echo $rows['datetime'];?></td>
                      <td style='font-size:20px; font-weight:bold;'>₹ <?php echo $rows['amoutpaid']; ?></td>
                      <td><?php echo $status; ?></td>
                      <td class='text-center' style='width:150px'><?php echo $abtn; ?></td>
                    </tr>
                  </tbody>
                </table>
                 <hr>
                 <span style="display:none;" id="orderid"><?php echo $orderid?></span>
            <form method="post" id="approvereq" autocomplete="off" style="<?php echo $action; ?>">
            <div class="col-md-6">
              <div class="form-group">
                <label>Token No. :</label>
                <?php
                error_reporting(0);
                $token=mysqli_fetch_assoc(mysqli_query($conn, "SELECT `token_no` FROM `tbl_tokens` ORDER by `token_no` DESC limit 1"));
                if($token['token_no']<1){
                 echo "<input type='text' class='form-control' placeholder='Enter Token No.' name='tokenno' required>";
                }else{
                  $token = $token['token_no']+1;
                  echo "<input type='text' class='form-control' placeholder='Enter Token No.' value='$token' name='tokenno' required readonly>";
                }
                ?>
              </div>
              <div class="form-group">
                <label>Member Name :</label>
                <input type="text" class="form-control" value="<?php echo $rows['member_name']?>" placeholder="Enter Member Name" name="membername" required readonly>
                <input type="hidden" class="form-control" value="<?php echo $orderid?>"  name="oid" required readonly>
                <input type="hidden" class="form-control" value="<?php echo $memberid?>"  name="memberid" required readonly>
              </div>
              <div class="form-group">
                <label>Father Name :</label>
                <input type="text" class="form-control" value="<?php echo $rows['father_name']?>" placeholder="Enter Father Name" name="fathername" required readonly>
              </div>
              <div class="form-group">
                <label>Mobile :</label>
                <input type="number" class="form-control" value="<?php echo $rows['mobile']?>"  placeholder="Enter Mobile No." name="mobile" required readonly>
              </div>
                <div class="form-group">
                <label>District :</label>
                <input type="text" class="form-control" value="<?php echo $rows['district']?>"  placeholder="Enter Mobile No." name="district" required readonly>
              </div>
              <!-- /.form-group -->
           </div>
            <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Select Agent :</label>
                <select class="form-control" id="selectclass" style="width: 100%;" name="agents" required>
                  <?php
                  $sql= mysqli_query($conn, "SELECT * FROM `agents`");
                  while($row=mysqli_fetch_assoc($sql)){
                    echo "<option value='$row[aid]'>$row[agent_name]</option>";
                  }
                  ?>
                </select>
              </div>
              <!-- /.form-group -->
              
              <div class="form-group">
                <label>Select ID Type :</label>
                <select class="form-control" style="width: 100%;" name="idtype" readonly>
                  <option selected="selected" value="">Select ID Type</option>
                  <option>Aadhar Card</option>
                  <option>PAN Card</option>
                  <option>Driving Licence</option>
                </select>
              </div>
              <div class="form-group">
                <label>ID Number :</label>
                <input type="text" class="form-control" placeholder="Enter ID Number" name="idno" readonly>
              </div>
              <div class="form-group">
                <label>Select Offer :</label>
                <select class="form-control" style="width: 100%;" name="offerchoose" id="offerchoose" required radonly>
                  <?php
                  $sql= mysqli_query($conn, "SELECT * FROM `tbl_token_offer` where `Id` = $rows[offerid]");
                  while($row=mysqli_fetch_assoc($sql)){
                    echo "<option value='$row[Id]' selected>Buy $row[buy] - Get $row[free] Free - $row[price]</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
              <label>.</label><br>
                <button type="submit" class="btn btn-flat btn-success" id='acbtn' name="accept">Accept</button>
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            
          </div>
          <!-- /.row -->
         </form>


              </div>
  <!-- /.col -->
</div>
<!-- /.row -->

</section>
<!-- /.content -->
</div>
  
  <!-- /.content-wrapper -->
<?php require("includes/footer.php");?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="custom/data.js"></script>
</body>
</html>
