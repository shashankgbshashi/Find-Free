<?php
require './basic/include.php';
require './basic/security.php';
$connect = mysqli_connect("localhost","root","","findfree");
$id = $_SESSION['id'];
$select_friends_id = "SELECT * FROM `friends` WHERE `id1` = $id || `id2` = $id";
$result_friends_id = mysqli_query($connect, $select_friends_id);
mysqli_close($connect);
while($array_id = mysqli_fetch_array($result_friends_id)){
    if($id == $array_id['id1']){
        $friend_id = $array_id['id2'];
    } else {
        $friend_id = $array_id['id1'];
    }
    $connect = mysqli_connect("localhost","root","","findfree");
    $status = 1;
    $select_friend = "SELECT * FROM `user` WHERE `id` = $friend_id && `status` = $status";
    $result_friend = mysqli_query($connect, $select_friend);
    mysqli_close($connect);
    $rows_active = mysqli_num_rows($result_friend);
    if($rows_active == 1){
        $array_friend = mysqli_fetch_array($result_friend);
        
        $connect = mysqli_connect("localhost","root","","findfree");
        $selectb = "SELECT * FROM `profile` WHERE `id` = $friend_id";
$resultb = mysqli_query($connect, $selectb);
$arrayback = mysqli_fetch_array($resultb);
while($arrayb = mysqli_fetch_array($resultb)){
    if($arrayback['uid'] < $arrayb['uid']){
        $arrayback = $arrayb;
    }
}
if($arrayback['date']<10){
    $arrayback['date'] = "0".$arrayback['date'];
}
if($arrayback['month']<10){
    $arrayback['month'] = "0".$arrayback['month'];
}
        //echo $array_friend['name'];
        ?>
<div style="border: 1px solid;">
    
    <img src="<?php echo "./".$arrayback['year']."/".$arrayback['month']."/".$arrayback['date']."/".$arrayback['name'];
    ?>" alt="image" title="cover" style="height: 75px;width: 75px;padding: 5px;margin-left: 25px;border-radius: 50%;">
   
    <span style="margin-left: 20px;"><?php echo $array_friend['name'];?></span>
     <img src="https://media4.picsearch.com/is?kRA2_VmdvPxBz0Zar0MuGXEEnJQHbqfjwI0f8twWDic&height=232" title="" alt="active"
         style="width:30px;height: 30px;margin-left: 30px;">
    
   
</div>
<?php
    }
}
?>