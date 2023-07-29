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
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
               -webkit-appearance: none;
                margin: 0;
        }
 
        input[type=number] {
            -moz-appearance: textfield;
        }
        td {
          height:auto;
  vertical-align: middle !important;
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
        Token 
        <small>Offers</small>
        <button class="btn btn-flat btn-success" id="addnewagent" style="float: right;">Add New Offer</button>
      </h1>

    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th class='text-center'>Buy</th>
                  <th class='text-center'>Free</th>
                  <th class='text-center'>Offer Price</th>
                  <th>Description</th>
                  <th class='text-center'>Image</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                  
                <?php
                    $n="";
                    $selectofferlist = mysqli_query($conn, "SELECT * FROM `tbl_token_offer`");
                    while($row = mysqli_fetch_assoc($selectofferlist)) {
                      $n++;
                     	echo "<tr>
                    	<td>$n</td>
                    	<td class='text-center'>$row[buy]</td>
                    	<td class='text-center'>$row[free]</td>
                    	<td class='text-center'>$row[price]</td>
                    	<td>$row[text]</td>
                    	<td class='text-center'><img src='dist/banner/$row[image]' width='50px'></td>
                    	<td class='text-center'><button class='btn btn-success btn-flat'>Edit</button>&nbsp;<button class='btn btn-danger btn-flat'>Delete</button></td>
                    	</tr>";
                     }
                ?>
                </tbody>
              </table>
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


<!-- Modal -->
  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <form action="getData/form_submit.php" method="POST"  autocomplete="off" enctype="multipart/form-data">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Offer</h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
              <div class="form-group">
                <label>Text :</label>
                <input type="text" class="form-control " id="" placeholder="Enter Offer Text" name="text" required>
              </div>
                <label>Buy :</label>
                <input type="number" id="" placeholder="Enter No. of Token" class="form-control" name="buy" required>
                </div>
                <div class="form-group">
                <label>Free :</label>
                <input type="number" class="form-control " id="" placeholder="Enter No. of Token" name="free" required>
              </div>
              <div class="form-group">
                <label>Offer Price :</label>
                <input type="number" class="form-control " id="" placeholder="Enter Offer Price" name="amount" required>
              </div>
              <div class="form-group">
                <label>Banner :</label>
                <input type="file" class="form-control " id=""  name="banner" accept="image/*" required>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit"  name="addoffer" class="btn btn-primary">Add Offer</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <!-- Modal End -->

        <!-- Modal Alert -->
  <div class="modal fade" id="modal-alert">
          <div class="modal-dialog" style="width:250px">
            <div class="modal-content" style="border-radius:10px">
                <div class="alertimage">
                  <img src="dist/img/right.png" alt="" width="100px" height="100px">
                </div>
                <div class="ct">
                  <h3>Success</h3>
                  <h5>Agent Added Successfully</h5>
                  <button data-dismiss="modal" autofocus>OK</button>
                  <br><br>
                </div>
            </div>
          </div>
  </div>

        <!-- Modal End  Alert-->




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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="custom/data.js"></script>
<!-- page script -->
<script>
  //load table
  agent_table_data();
  $('#addnewagent').click(function(){
    $('#modal-default').modal('show'); 
  })
</script>
</body>
</html>
