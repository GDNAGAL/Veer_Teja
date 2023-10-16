<?php
  include("../veerTejaAdmin/includes/connection.php");
  $prizelist = mysqli_query($conn, "SELECT * FROM prize");
  
  $id = $_GET['id'];
  if($id=="" || $id==null || $id < 1 || $id > 29){
    header("Location: Home");
  }else{
    $imageandname = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `image`, PrizeName FROM prize where id = $id"));
    $winner = mysqli_query($conn, "SELECT * FROM prize_winner where prize_id = $id");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Draw Open</title>
    <link rel="stylesheet" href="assets/css/customstyle.css">
    <link rel="stylesheet" href="assets/css/congratulations.css">
</head>
<body>
<div class="main" style='display:flex'>
    <div class="navigation">
        <ul>
        <?php
        while($row = mysqli_fetch_assoc($prizelist)) {
          if($row['id']==$_GET['id']){
           echo " <li class='active'>";
          }else{
            echo "<li>";
          }
          ?>
          <a href='Winner?id=<?php echo $row['id'];?>&text=<?php echo $row['PrizeName'];?>'>
          <span class='icon'><?php echo $row['rank'];?></span>
          <span class='title'><?php echo $row['PrizeName'];?></span>
          </a>
          </li>
          <?php
        }
        ?>
        </ul>
    </div> 
    <div class="side">
        <div class="odometers">
          
            <div class="subval" id="numa">0</div>
            <div class="subval" id="numb">0</div>
            <div class="subval" id="numc">0</div>
            <div class="subval" id="numd">0</div>
            <div class="subval" id="nume">0</div>
        </div>
        <h1><?php echo $imageandname['PrizeName']; ?>
        <span style="font-size:10px; display:block; color:red">* Orignal Product May be different from display image.</span></h1>
        
        <div class="bottom" style='display:flex'>
            <div class="img">
                <img src="images/<?php echo $imageandname['image']; ?>" alt="">
            </div>
            <div class="nameWinner">
                <h3>Winners :</h3>
                <?php  
                while($row = mysqli_fetch_assoc($winner)) 
                { 
                  if($row['token_no']==""||$row['token_no']==null){
                    ?>
                    <div class="list">
                    <span style='display:none' id='roundid'><?php echo $row['id']; ?></span>
                    <div class="code" id='token'>----</div>
                    <div class="name" id='membername'>-------------</div>
                    <button id="unlock">Unlock</button>
                    </div>
                    <?php
                  }else{
                    ?>
                    <div class="list">
                    <span style='display:none' id='roundid'><?php echo $row['id']; ?></span>
                    <div class="code" id='token'><?php echo $row['token_no']; ?></div>
                    <div class="name" id='membername'><?php echo $row['name']; ?></div>
                    </div>
                    <?php
                  }
                ?>
                
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <a href="Winner?id=<?php echo $_GET['id']-1;?>"><button class="control pre">PREVIOUS</button></a>
    <a href="Winner?id=<?php echo $_GET['id']+1;?>"><button class="control next">NEXT</button></a>
</div>


<div class="js-container container" id="modalcnt" style="top:0px !important;"></div>

  <div style="text-align:center;margin-top:30px;position:  fixed;width:100%;height:100%;top:0px;left:0px; display:none" id='modalbody'>
    <div class="checkmark-circle">
      <div class="background"></div>
      <div class="checkmark draw"></div>
    </div>
    <h1>Congratulations!</h1><br>
    <div class="odometers result">
            <strong class="tkn">Token No</strong>
            <div class="subval" id="resulta">0</div>
            <div class="subval" id="resultb">0</div>
            <div class="subval" id="resultc">0</div>
            <div class="subval" id="resultd">0</div>
            <div class="subval" id="resulte">0</div>
        </div>
    <br>
    <p style="text-transform:capitalize; font-weight:bold; font-size:24px">Name : <span id="cname"></span></p><br>
    <p style="text-transform:capitalize; font-weight:bold">Coupon No : <span id="cpn"></span></p><br>
    <button class="submit-btn" type="submit" onclick="location.reload();">Continue</button>
  </div> 



  <script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/congratulations.js"></script>
<script>
$( document ).ready(function() {
 $(document).on("click","#unlock", async function(e){
  startAnimation = setInterval(myAnimation, 50);
  let button = document.querySelectorAll("#unlock");
  for (var i = 0; i < button.length; i++) {
      button[i].disabled = true;
  }
  // $(button).prop( "disabled", true );
  $(this).text( "Please Wait...");
  let id =$(this).parent().children("#roundid").text();
  let returndata =  getLuckyMember(id);
  await setTokenNo(returndata[0]);
  $(this).hide();
  $(this).parent().children("#token").html(returndata[0])
  $(this).parent().children("#membername").html(returndata[1])
  setTimeout(() => {
  $("#modalcnt").show();
  $("#modalbody").show();
  $("#cname").html(returndata[1]);
  $("#cpn").html(returndata[2]);
  }, 1500);
 });







var startAnimation=null;
function myAnimation(){
        $("#numa").html(Math.floor(Math.random() * 3))
        $("#numb").html(Math.floor(Math.random() * 10))
        $("#numc").html(Math.floor(Math.random() * 10))
        $("#numd").html(Math.floor(Math.random() * 10))
        $("#nume").html(Math.floor(Math.random() * 10))
}
function stopAnimation(result){
        $("#numa").html(result[0])
        $("#numb").html(result[1])
        $("#numc").html(result[2])
        $("#numd").html(result[3])
        $("#nume").html(result[4])

        $("#resulta").html(result[0])
        $("#resultb").html(result[1])
        $("#resultc").html(result[2])
        $("#resultd").html(result[3])
        $("#resulte").html(result[4])     
}


// async function setTokenNo(tokenno){
//  await setTimeout(() => {
//     window.clearInterval(startAnimation)
//     var num = tokenno;
//     var digits = num.toString().split('');
//     var realDigits = digits.map(Number)
//     stopAnimation(realDigits)
//   }, 5000);
// }
function setTokenNo(token){
  return  new Promise(function (resolve, reject) {
    setTimeout(function () {
      window.clearInterval(startAnimation)
      var num = token;
      var digits = num.toString().split('');
      var realDigits = digits.map(Number)
      stopAnimation(realDigits)
      resolve('OK')
    }, 5000); 
  });
}


//get lucky number
function getLuckyMember(id){
  let token;
  let member;
  let coupon;
  let data = new FormData();
  data.append("id", id);
  data.append("GetLuckyMember", "");
  $.ajax({
      type: "POST", 
      url: "fetchLuckyMember.php",              
      data: data, 
      contentType: false,       
      cache: false,   
      async: false,          
      processData:false,
      success: function(result){
       token = result;
        //console.log(token)
      }
    });
    return token;
}


});
</script>
</body>
</html>