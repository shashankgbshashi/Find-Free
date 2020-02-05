<?php
session_start();
 $user = $_SESSION['id'];
 $id = $_POST['id'];
 /*$connect = mysqli_connect("localhost","root","","findfree");
 $select_like = "SELECT * FROM `profile` WHERE `uid` = $id";
 $result_like = mysqli_query($connect, $select_like);
 mysqli_close($connect);
 $array_like  = mysqli_fetch_array($result_like);
 $likes = $array_like['likes'] + 1;*/
 
$connect = mysqli_connect("localhost","root","","findfree");
$status = 1;
$insert_like_id = "INSERT INTO `likes` (`user_id`, `photo_id`, `status`) VALUES ($user,$id,$status)";
$result_like_id = mysqli_query($connect, $insert_like_id);
var_dump($result_like_id);
mysqli_close($connect);
 
 
/* $connect = mysqli_connect("localhost","root","","findfree");
 $update = "UPDATE `profile` SET `likes` = $likes WHERE `uid` = $id";
$result_update = mysqli_query($connect, $update);
mysqli_close($connect);
 */



 //echo "<script>window.location.href='profile.php'</script>"; 
 
 
 ?>
<?php
?>