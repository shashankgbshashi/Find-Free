<?php

//include './basic/security.php';
include './basic/include.php';
session_start();
//var_dump($_SESSION);
//echo $_SESSION['name'];
if(isset($_SESSION['name']) && isset($_SESSION['email'])){
  //  echo $_SESSION['name'];
}else{
    exit('');
}
$connect = mysqli_connect("localhost","root","","findfree");
$status = 0;
$id = $_SESSION['id'];
$update = "UPDATE `user` SET `status` = $status WHERE `id` = $id ";
$result = mysqli_query($connect, $update);
//var_dump($result);

$_SESSION = array();
setcookie(session_name(),"",time()-1,"/");
session_destroy();
