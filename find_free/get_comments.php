<?php
session_start();
$photo_id = $_POST['id'];
$connect = mysqli_connect("localhost","root","","findfree");
$select_comments = "SELECT * FROM `comments` WHERE `photo_id` = $photo_id";
//$select_comments = "SELECT * FROM `comments` WHERE "
$result_comment = mysqli_query($connect, $select_comments);
//var_dump($result_comment);
mysqli_close($connect);
$rows = mysqli_num_rows($result_comment);
if($rows!=0){
    while($array_comments = mysqli_fetch_array($result_comment)){
        $user_commented = $array_comments['user_id'];
        $connect = mysqli_connect("localhost","root","","findfree");
         $select_profile = "SELECT * FROM `profile` WHERE `id` = $user_commented ORDER BY `uid` DESC";
                               $result_profile = mysqli_query($connect, $select_profile);
                               if($result_profile){
                                   $array_frnd_profile = mysqli_fetch_array($result_profile);
                                          }
                                  if($array_frnd_profile['date']<10){
            $array_frnd_profile['date'] = "0".$array_frnd_profile['date'];
        } else {
            $array_frnd_profile['date'] = $array_frnd_profile['date'];
            
        }
        if($array_frnd_profile['month']<10){
            $array_frnd_profile['month'] = "0".$array_frnd_profile['month'];
        } else {
            $array_frnd_profile['month'] = $array_frnd_profile['month'];
            
        }        
        
        ?>
<img src="<?php 
echo "./".$array_frnd_profile['year']."/".$array_frnd_profile['month']."/".$array_frnd_profile['date']."/".$array_frnd_profile['name'];
      ?>" alt="image" title="image" width="30" height="30" style="border-radius:50%;float: left;margin-left: 30px;">
<h6 style="display: inline;float: left;margin-left: 30px;"><?php echo $array_comments['content'];?></h6><br><br>
<?php
    }
}else{
    
}
?>