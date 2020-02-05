<?php

include './basic/include.php';
 include './basic/security.php';
 
 $connect = mysqli_connect("localhost","root","","findfree");
 $to_id = $_SESSION['other_id'];
 $from_id = $_SESSION['id'];
 //$opend = 0;
 //$about = "sent You Friend Request";
 $delete = "DELETE FROM `notification` WHERE `to_id` = $to_id && `from_id` = $from_id";
 $result = mysqli_query($connect, $delete);
 mysqli_close($connect);
 
 $connect = mysqli_connect("localhost","root","","findfree");
 $delete_request = "DELETE FROM `friend_request` WHERE `to_id` = $to_id && `from_id` = $from_id";
 $result_request = mysqli_query($connect, $delete_request);
 if($result && $result_request){
     
    // echo 'inserted';
     //$_SESSION['request_sent'] = 0;
     echo "<script>window.location.href='others_profile_html.php'</script>";
 }

?>