<?php
session_start();
//var_dump($_SESSION);
//echo $_SESSION['name'];
if(isset($_SESSION['name']) && isset($_SESSION['email'])){
  //  echo $_SESSION['name'];
}else{
    exit('illegal working');
}