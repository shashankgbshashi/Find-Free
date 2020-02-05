<?php

include './basic/include.php';
 include './basic/security.php';
 $connect = mysqli_connect("localhost","root","","findfree");
 echo $_POST['msg'];
 $msg = $_POST['msg'];
 $to_id = $_SESSION['other_id'];
 $from = $_SESSION['id'];
 $insert = "INSERT INTO `message`(`to_id`, `from_id`, `content`) VALUES($to_id,$from,'$msg')";
 $result = mysqli_query($connect, $insert);
 mysqli_close($connect);
 if($result){
     
     $connect = mysqli_connect("localhost","root","","findfree");
     $id1 = $_SESSION['id'];
 $id2 = $_SESSION['other_id'];
 $select_msg_user = "SELECT * FROM `message_users` WHERE (`id1` = $id1 && `id2` = $id2) || (`id1` = $id2 && `id2` = $id1)";
 $result_sele_msg_user = mysqli_query($connect, $select_msg_user);
 mysqli_close($connect);
 $rows_msg_user = mysqli_num_rows($result_sele_msg_user);
 if($rows_msg_user == 0){
     
     $connect = mysqli_connect("localhost","root","","findfree");
 $id1 = $_SESSION['id'];
 $id2 = $_SESSION['other_id'];
 $insert_msg_user = "INSERT INTO `message_users`(`id1`, `id2`) VALUES ($id1,$id2)";
 $result_msg_user = mysqli_query($connect, $insert_msg_user);
 var_dump($result_msg_user);
 mysqli_close($connect);
 }
               
 }
 
 
 
?>