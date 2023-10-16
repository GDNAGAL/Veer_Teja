<?php
  include("../veerTejaAdmin/includes/connection.php");
  include("lucky.php");
  
  if(isset($_POST['GetLuckyMember'])){
    $id = $_POST['id'];
    $genrateRandomTokenNumber = fetchLuckyMember($id);

    $luckytoken = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_tokens` where token_no = $genrateRandomTokenNumber LIMIT 1"));
    $memberDetails = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_members` where id = $luckytoken[member_id] LIMIT 1"));
    mysqli_query($conn, "UPDATE `prize_winner` SET `token_no`='$luckytoken[token_no]', `member_id`='$memberDetails[id]', `couponno`='$luckytoken[offlinetokenno]',`name`='$memberDetails[member_name]' WHERE id = $id");
    

    //check all complete or not 
    $chrckprize = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `prize_winner` where token_no = '' and prize_id = '$id'"));
    if($chrckprize==0){
      mysqli_query($conn, "UPDATE `prize` SET `status`='1' where id = $id");
    }
    //echo $luckytoken['token_no'];
    http_response_code(200);
    header('Content-Type: application/json');
    $data = [ $luckytoken['token_no'], $memberDetails['member_name'],$luckytoken['offlinetokenno']];
    echo json_encode( $data );

  }else{
    http_response_code(401);
    header('Content-Type: application/json');
    $data = ['Unauthorized User'];
    echo json_encode( $data );
  }

?>