<?php
include './basic/include.php';
include './basic/security.php';
?>
<style>
    #image{
        width: 50px;height: 50px;border-radius: 50%;
    }
    nav{
        border-bottom: 1px solid;
        margin-bottom: 30px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light" >
           <div class="container">
  <a class="navbar-brand" href="#">Find Free</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
        
      <li class="nav-item active">
          <a href="profile.php" style="margin-left:50px;">
                        <i class="fa fa-home" aria-hidden="true" style="font-size: 25px;" ></i>
                        </a>   
<a href="notification.php" style="margin-left:50px;">
                            <i class="fa fa-window-restore" aria-hidden="true" style="font-size: 25px;"
                               id="notification"></i>
                        </a>  
           <a href="logout.php" style="margin-left:50px;">
                            <i class="fas fa-sign-out-alt" style=" font-size: 25px;"></i>
                            
                        </a>
      </li>
      
        
    </ul>
  </div>
           </div>
</nav>

<div class="row">
    <div class="col-sm-3">
        
    </div>
    <div class="col-sm-6">
        <?php

$connect = mysqli_connect("localhost","root","","findfree");
$id = $_SESSION['id'];
$select_msg_user = "SELECT * FROM `message_users` WHERE `id1` = $id || `id2` = $id";
$result_user = mysqli_query($connect, $select_msg_user);
mysqli_close($connect);
while($array_user = mysqli_fetch_array($result_user)){
    //var_dump($array_user);
    if($array_user['id1'] == $id){
        $friend_id = $array_user['id2'];
    }else{
        $friend_id = $array_user['id1'];
    }
    
    $connect = mysqli_connect("localhost","root","","findfree");
    $select_user = "SELECT * FROM `user` WHERE `id` = $friend_id";
    $result_frnd = mysqli_query($connect, $select_user);
    mysqli_close($connect);
    $array_frnd = mysqli_fetch_array($result_frnd);
   // var_dump($array_frnd);
    
    $connect = mysqli_connect("localhost","root","","findfree");

$select_profile = "SELECT * FROM `profile` WHERE `id` = $friend_id ORDER BY `uid` DESC";
$result_profile = mysqli_query($connect, $select_profile);
mysqli_close($connect);
if($result_profile){
    $array_profile = mysqli_fetch_array($result_profile);
    if($array_profile['date']<10){
            $array_profile['date'] = "0".$array_profile['date'];
        } else {
            $array_profile['date'] = $array_profile['date'];
            
        }
        if($array_profile['month']<10){
            $array_profile['month'] = "0".$array_profile['month'];
        } else {
            $array_profile['month'] = $array_profile['month'];
            
        }


}




    ?>
        <center>
<img src="<?php 
echo "./".$array_profile['year']."/".$array_profile['month']."/".$array_profile['date']."/".$array_profile['name'];
?>" alt="image" id="image">
<h6 style="display: inline;margin-left: 30px;"><?php echo $array_frnd['name'];?></h6>
<form action="message.php" method="post" style="display:inline;margin-left: 30px;">
    <input type="number" value="<?php echo $array_frnd['id']?>" name="frnd" style="display:none;">
    <button type="submit" class="btn btn-outline-primary" name="msg_btn">Message</button>
</form>
<br><br></center>
        
<?php
    
}
?>
    </div>
    <div class="col-sm-3"></div>
</div>

<script type="text/javascript">
//$('#mes').mousemove(function(){
//    $(this).css('background-color','red');
//});
//$('#mes').mouseout(function(){
//    $(this).css('background-color','white');
//});
</script>