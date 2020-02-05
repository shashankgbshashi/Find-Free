<html>
    <body>
<?php
include './basic/include.php';
 include './basic/security.php';
 
 $connect = mysqli_connect("localhost","root","","findfree");
 $id = $_SESSION['id'];
 $select = "SELECT * FROM `notification` WHERE `to_id` = $id and `open` = 0";
 $result_notification = mysqli_query($connect, $select);
 $rows_notification = mysqli_num_rows($result_notification);
 
 mysqli_close($connect);
 if($rows_notification != 0){
 //$connect = mysqli_connect("localhost","root","","findfree");
 
 while ($array_notificaton = mysqli_fetch_array($result_notification)){
     $uid = $array_notificaton['uid'];
     $from = $array_notificaton['from_id'];
     $connect = mysqli_connect("localhost","root","","findfree");
     $select_from = "SELECT * FROM `user` WHERE `id` = $from";
     $result_user = mysqli_query($connect, $select_from);
     $array_user = mysqli_fetch_array($result_user);
     mysqli_close($connect);
     
     $connect = mysqli_connect("localhost","root","","findfree");

$select_profile = "SELECT * FROM `profile` WHERE `id` = $from";
$result_profile = mysqli_query($connect, $select_profile);
if($result_profile){
    $array_profile = mysqli_fetch_array($result_profile);
while($array_pro = mysqli_fetch_array($result_profile)){
    if($array_profile['uid'] < $array_pro['uid']){
        $array_profile = $array_pro;
    }
}
}
if($array_profile['date']<10){
    $array_profile['date'] = "0".$array_profile['date'];
}
if($array_profile['month']<10){
    $array_profile['month'] = "0".$array_profile['month'];
}
//var_dump($array_profile);
//var_dump($array_background);
mysqli_close($connect);
?>
<center>
<div class="notification" style="border: 1px solid;background: beige;width: 800px;font-family: cursive;">
    <img src="<?php echo "./".$array_profile['year']."/".$array_profile['month']."/".$array_profile['date']."/".$array_profile['name'];?>
         " alt="image" title="profile" style="height: 150px;width: 150px;padding: 5px;">
    <span>
        <?php
        echo $array_user['name']." ".$array_notificaton['about']."".$array_user['id'];?>
    </span><br>
    <form method="post" action="#">
        
        
        <input type="button" class="btn btn-primary confirm" value="confirm"  id="confirm"
               data-id="<?php echo $array_user['id'];?>"><label></label>
        <input type="button" class="btn btn-danger ignore" value="ignore" id="ignore"
               data-id="<?php echo $array_user['id'];?>">
        
    </form>
</div></center>
 <?php 
 
 }
 }/*
 if(isset($_POST['confirm'])){
     $connect = mysqli_connect("localhost","root","","findfree");
     $id1 = $_POST['id_request'];
     $id2 = $_SESSION['id'];
     $insert = "INSERT INTO `friends`(`id1`, `id2`) VALUES($id1,$id2)";
     $result_friend = mysqli_query($connect,$insert);
     mysqli_close($connect);
     
     
     $connect = mysqli_connect("localhost","root","","findfree");
 $update = "UPDATE `notification` SET `open` = 1 WHERE `uid` = $uid ";
 $result_open = mysqli_query($connect, $update);
 mysqli_close($connect);
 
 $_SESSION['notification'] = $rows_notification - 1 ;
 
 $to_id = $_SESSION['id'];
 $from_id = $from;
  $connect = mysqli_connect("localhost","root","","findfree");
 $delete_request = "DELETE FROM `friend_request` WHERE `to_id` = $to_id && `from_id` = $from_id";
 $result_request = mysqli_query($connect, $delete_request);
 
 echo "<script>window.location.href='notification.php'</script>"; 
     
 }
if(isset($_POST['ignore'])){
    $connect = mysqli_connect("localhost","root","","findfree");
 $update = "UPDATE `notification` SET `open` = 1 WHERE `uid` = $uid ";
 $result_open = mysqli_query($connect, $update);
 mysqli_close($connect);
 
 $_SESSION['notification'] = $rows_notification - 1 ;
 
 $to_id = $_SESSION['id'];
 $from_id = $from;
  $connect = mysqli_connect("localhost","root","","findfree");
 $delete_request = "DELETE FROM `friend_request` WHERE `to_id` = $to_id && `from_id` = $from_id";
 $result_request = mysqli_query($connect, $delete_request);
 
 echo "<script>window.location.href='notification.php'</script>";
} */
 
 
 ?>
</body>
<script type="text/javascript">
    $('.confirm').click(function(){
        var id = $(this).data('id');
        console.log(id);
        
        $.post('confirm_request.php',{id:id},function(data){
            console.log(data);
            
        });
        console.log($(this).parent().parent());
        
        $(this).parent().parent().hide();
    });
    
    $('.ignore').click(function(){
        var id = $(this).data('id');
        
        $.post('ignore_request.php',{id:id},function(){
            
        });
        $(this).parent().parent().hide();
    });
    </script>
</html>


