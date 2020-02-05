<?php
include './basic/include.php';
 include './basic/security.php';
 
 $connect = mysqli_connect("localhost","root","","findfree");
 $to_id = $_SESSION['other_id'];
 $from_id = $_SESSION['id'];
 $opend = 0;
 $about = "sent You Friend Request";
 $insert = "INSERT INTO `notification`(`to_id`, `from_id`, `open`,`about`) VALUES"
         . "($to_id,$from_id,$opend,'$about')";
 $result = mysqli_query($connect, $insert);
 mysqli_close($connect);
 
 
  $connect = mysqli_connect("localhost","root","","findfree");
  $inset_request = "INSERT INTO `friend_request`(`to_id`, `from_id`) VALUES ($to_id,$from_id)";
  $result_request = mysqli_query($connect, $inset_request);
  mysqli_close($connect);
  if($result && $result_request){
      echo "<script>window.location.href='others_profile_html.php'</script>";
  }
 
 
?>

 
