<?php


require './basic/include.php';
if(!empty($_POST['name']) && !empty($_POST['password'])){
$connect = mysqli_connect("localhost","root","","findfree");
$name = $_POST['name'];
$password = md5($_POST['password']);
$select = "SELECT * FROM `user` WHERE `name` = '$name' && `password` = '$password'";
$result = mysqli_query($connect, $select);
$array = mysqli_fetch_array($result);
mysqli_close($connect);
//var_dump($array);


$connect = mysqli_connect("localhost","root","","findfree");
$id = $array['id'];
$select_background = "SELECT * FROM `backgroud_pic` WHERE `id` = $id ORDER BY `uid` DESC";
$result_background = mysqli_query($connect, $select_background);
if($result_background){
$array_background = mysqli_fetch_array($result_background);
/*while($array_ba = mysqli_fetch_array($result_background)){
    if($array_background['uid'] < $array_ba['uid']){
        $array_background = $array_ba;
    }
}*/
}

//var_dump($array_background);
mysqli_close($connect);

$connect = mysqli_connect("localhost","root","","findfree");
$status = 1;
$update_user = "UPDATE `user` SET `status` = $status WHERE `id` = $id";
$result_update = mysqli_query($connect, $update_user);
mysqli_close($connect);



$connect = mysqli_connect("localhost","root","","findfree");

$select_profile = "SELECT * FROM `profile` WHERE `id` = $id ORDER BY `uid` DESC";
$result_profile = mysqli_query($connect, $select_profile);
if($result_profile){
    $array_profile = mysqli_fetch_array($result_profile);
/*while($array_pro = mysqli_fetch_array($result_profile)){
    if($array_profile['uid'] < $array_pro['uid']){
        $array_profile = $array_pro;
    }
}*/

}


//var_dump($array_profile);
//var_dump($array_background);
mysqli_close($connect);


$connect = mysqli_connect("localhost","root","","findfree");
$select_about = "SELECT `uid`, `id`, `date`, `month`, `year`, `work`, `relation`, `thought` FROM `about` WHERE `id` = $id";
$result_about = mysqli_query($connect, $select_about);
if($result_about){
$array_about = mysqli_fetch_array($result_about);
}
mysqli_close($connect);
 
 $connect = mysqli_connect("localhost","root","","findfree");
 $id = $array['id'];
 $select = "SELECT * FROM `notification` WHERE `to_id` = $id and `open` = 0";
 $result_notification = mysqli_query($connect, $select);
 if($result_notification){
 $rows_notification = mysqli_num_rows($result_notification);
 }
 
 
if($result && $result_background && $result_profile && $result_about){
    session_start();
    $_SESSION['visit'] = 0;
    $_SESSION['name'] = $array['name'];
    $_SESSION['id'] = $array['id'];
    $_SESSION['email'] = $array['email'];
    if($array_background['date']<10){
            $_SESSION['date_background'] = "0".$array_background['date'];
        } else {
            $_SESSION['date_background'] = $array_background['date'];
            
        }
        if($array_background['month']<10){
            $_SESSION['month_background'] = "0".$array_background['month'];
        } else {
            $_SESSION['month_background'] = $array_background['month'];
            
        }
        
        
        $_SESSION['year_background'] = $array_background['year'];
        $_SESSION['background_pic'] = $array_background['name'];
        
        $_SESSION['year_profile'] = $array_profile['year'];
        $_SESSION['profile_pic'] = $array_profile['name'];
        
        if($array_profile['date']<10){
            $_SESSION['date_profile'] = "0".$array_profile['date'];
        } else {
            $_SESSION['date_profile'] = $array_profile['date'];
            
        }
        if($array_profile['month']<10){
            $_SESSION['month_profile'] = "0".$array_profile['month'];
        } else {
            $_SESSION['month_profile'] = $array_profile['month'];
            
        }
        $_SESSION['work'] = $array_about['work'];
        $_SESSION['relation'] = $array_about['relation'];
        $_SESSION['dob_date'] = $array_about['date'];
        $_SESSION['dob_month'] = $array_about['month'];
        $_SESSION['dob_year'] = $array_about['year'];
        $_SESSION['thought'] = $array_about['thought'];
        $_SESSION['notification'] = $rows_notification; 
                
       // var_dump($_SESSION);
        echo "<script>window.location.href='profile.php'</script>";
    
} else {
    echo '<div style="color:black;padding:100px;"><h3>User not found</h3></div>';
    exit();  

}

}


else{
  echo '<div style="color:black;padding:100px;"><h3>Improper Information</h3></div>';
    exit();  
}
?>
