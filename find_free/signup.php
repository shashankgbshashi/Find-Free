<?php
//echo 'hello';
if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['number']) && !empty($_POST['password']))
{
    //var_dump(isset($_POST['name']));
 require './basic/include.php';
$connect = mysqli_connect("localhost","root","","findfree");
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['number'];
$password = md5($_POST['password']);
$status = 1;



$insert = "INSERT INTO `user`(`name`, `email`, `password`, `phone`,`status`) VALUES ('$name','$email','$password',$phone,$status)";

     
$result = mysqli_query($connect, $insert);

if($result){
    //var_dump($result);
    //echo 'inserted';
    
//    var_dump($result);
    //var_dump(mysqli_fetch_array($result));
    mysqli_close($connect);
    $connect = mysqli_connect("localhost","root","","findfree");
    $select = "SELECT * FROM `user` WHERE `email` = '$email' && `password` = '$password'";
    $result = mysqli_query($connect, $select);
    if($result){
        session_start();
        while ($array = mysqli_fetch_array($result)){
           // var_dump($array);
            //session_start();
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $array['id'];
        $_SESSION['visit'] = 0;
        $_SESSION['notification'] = 0;
        } 
        //var_dump($result);
    }
    mysqli_close($connect);
    
    
    
   echo "<script>window.location.href='file_html.php'</script>"; 
    
    
}

}

else{
    echo '<div style="color:black;padding:100px;"><h3>Improper Information</h3></div>';
    exit();  

}

?>








    