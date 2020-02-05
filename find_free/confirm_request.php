<?php
session_start();

     $id1 = $_POST['id'];
     $id2 = $_SESSION['id'];
     
       $connect = mysqli_connect("localhost","root","","findfree");
     $insert = "INSERT INTO `friends`(`id1`, `id2`) VALUES($id1,$id2)";
     $result_friend = mysqli_query($connect,$insert);
     mysqli_close($connect);
     
     
     $connect = mysqli_connect("localhost","root","","findfree");
 $delete_notification = "DELETE FROM `notification` WHERE `to_id` = $id2 && `from_id` = $id1";
 $result_open = mysqli_query($connect, $delete_notification);
 mysqli_close($connect);
 
 $connect = mysqli_connect("localhost","root","","findfree");
 $delete_frnd_rqst = "DELETE FROM `friend_request` WHERE `to_id` = $id2 && `from_id` = $id1";
 $result_delete = mysqli_query($connect, $delete_frnd_rqst);
 mysqli_close($connect);
 
 $_SESSION['notification'] = $_SESSION['notification'] - 1 ;
     

 
 
 
 
   
 
 
 ?>

 <?php?>