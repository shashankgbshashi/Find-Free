<?php

session_start();
 $user = $_SESSION['id'];
 $id = $_POST['id'];
 $connect = mysqli_connect("localhost","root","","findfree");
 $select_like = "SELECT * FROM `likes` WHERE `user_id` = $user && `photo_id` = $id";
 //$select_like = "SELECT * FROM `profile` WHERE `uid` = $id";
 $result_like = mysqli_query($connect, $select_like);
 $rows_like = mysqli_num_rows($result_like);
 if($rows_like == 0){
     echo 0;
 } else {
     echo 1;
}

?>