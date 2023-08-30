<?php

$mid = $_GET['mid'];
// error_reporting(0);


include("includes/connection.php");
if($mid=="" || $mid == null){
  header("location:index");
}
$tokensql = mysqli_query($conn, "SELECT * FROM `tbl_tokens` where `member_id`=$mid");
$totaltoken = mysqli_num_rows($tokensql);
$memberrow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_members` INNER JOIN `agents` ON tbl_members.agent = agents.aid where tbl_members.id='$mid'"));
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
        Member Details
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

        <h3 class="profile-username text-center text-capitalize"><?php echo $memberrow['member_name']; ?><br>
        <span id='changemobile' style='color:blue; font-size:12px; cursor:pointer;'>Change Mobile No.</span></h3>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">

            <input type="hidden" id='mid' value="<?php echo $mid;?>">
            <b>Father Name</b> <a class="pull-right text-capitalize"><?php echo $memberrow['father_name']; ?></a>
          </li>
          <li class="list-group-item">
            <b>Mobile</b> <a class="pull-right"><?php echo $memberrow['mobile']; ?></a>
          </li>
          <li class="list-group-item">
            <b>Id </b> <a class="pull-right text-capitalize"><?php echo $memberrow['id_type']; ?></a>
          </li>
          <li class="list-group-item">
            <b>Id No. </b> <a class="pull-right text-capitalize"><?php echo $memberrow['id_number']; ?></a>
          </li>
          <li class="list-group-item">
            <b>District</b> <a class="pull-right text-capitalize"><?php echo $memberrow['district']; ?></a>
          </li>
          <li class="list-group-item">
            <b>Agent</b> <a class="pull-right text-capitalize"><?php echo $memberrow['agent_name']; ?></a>
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
              <h3 class="box-title">Token Details - <?php echo $totaltoken; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Token No.</th>
                    <th>Coupon No.</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    
                    while($token = mysqli_fetch_assoc($tokensql)){
                      if($token['type']=="FREE"){
                        $status = "<span class='label label-success'>FREE</span>";
                      }elseif($token['type']=="PAID"){
                        $status = "<span class='label label-danger'>PAID</span>";
                      }
                      echo "<tr>
                      <td>$token[token_no]</td>
                      <td>$token[offlinetokenno]</td>
                      <td>$token[amount]</td>
                      <td>$token[amount]</td>
                      <td>$status</td>
                    </tr>";
                    }
                    ?>
                    
                  </tbody>
                </table>


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
<!-- page script -->
<script>

 $( document ).ready(function() {
  // var table = $('#membertables').DataTable();
$('#changemobile').on('click',function(){
  let newmobile = prompt("Enter New Number");
  //alert(newmobile.trim())
  let data = new FormData();
    data.append("newmobileno", newmobile.trim());
    data.append("memberid", $('#mid').val().trim());
    data.append("updatemobile","");
    $.ajax({
      type: "POST", 
      url: "getData/form_submit.php",              
      data: data, 
      contentType: false,       
      cache: false,             
      processData:false,
      success: function(result){
      alert(result);
      location.reload(true);
      }
    });
})
})


</script>
</body>
</html>
