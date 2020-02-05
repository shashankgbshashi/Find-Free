<?php
session_start();
$user_id = $_SESSION['id'];
$photo_id = $_POST['id'];
$content = $_POST['text'];
$connect = mysqli_connect("localhost","root","","findfree");
$insert_comment = "INSERT INTO `comments` (`photo_id`, `user_id`, `content`) VALUES ($photo_id,$user_id,'$content')";
$result_comment = mysqli_query($connect, $insert_comment);
mysqli_close($connect);
?>