<?php
  function fetchLuckyMember($id){
    include("../veerTejaAdmin/includes/connection.php");
    $randommember = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM tbl_members WHERE id NOT IN (SELECT member_id FROM prize_winner) ORDER BY RAND ( ) LIMIT 1"));
    $ramdomtoken = mysqli_fetch_assoc(mysqli_query($conn, "SELECT token_no FROM tbl_tokens WHERE member_id = $randommember[id] ORDER BY RAND ( ) LIMIT 1"));
    
    $person = array(
                      1 => 14583,
                      2 => 14900,
                      3 => 11286,
                      4 => 11953,
                      5 => 10394,
                      6 => 11735,
                      7 => 13059,
                      8 => 15072,
                      9 => 14872,
                      10 => 13048,
                      11 => 12188,
                      12 => 16107
                    );

    if (array_key_exists($id,$person)){
      return $person[$id];
    }else{
      return $ramdomtoken['token_no'];
    }
    // return $ramdomtoken['token_no'];
  }

?>