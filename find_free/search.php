<?php
$connect = mysqli_connect("localhost","root","","findfree");
$name = $_POST['name'];

//$select = "SELECT * FROM `user` WHERE name LIKE '%$name%'";
$select = "SELECT * FROM `user` WHERE name LIKE '%$name%'";

$result = mysqli_query($connect, $select);
$rows = mysqli_num_rows($result);
if($rows!= 0){
$i = 1;

while($array = mysqli_fetch_array($result)){
    
$i++;
$id = $array['id'];
$selectb = "SELECT * FROM `backgroud_pic` WHERE `id` = $id";
$resultb = mysqli_query($connect, $selectb);
$rows = mysqli_num_rows($resultb);
if($rows!=0){
$arrayback = mysqli_fetch_array($resultb);
while($arrayb = mysqli_fetch_array($resultb)){
    if($arrayback['uid'] < $arrayb['uid']){
        $arrayback = $arrayb;
    }
}

//var_dump($arrayback);


if($arrayback['date']<10){
    $arrayback['date'] = "0".$arrayback['date'];
}
if($arrayback['month']<10){
    $arrayback['month'] = "0".$arrayback['month'];
}
//var_dump($arrayback);
if($i>6){
    break;
}
?>
<div style="border: 1px solid;color: black;">
    <img src="<?php echo "./".$arrayback['year']."/".$arrayback['month']."/".$arrayback['date']."/".$arrayback['name'];
    ?>" alt="image" title="cover" style="height: 50px;width: 50px;padding: 5px;margin-left: 25px;border-radius: 50%">
    <span style="margin-left: 20px;"><?php echo $array['name'];?></span>
    <span style="margin-left: 40px;"><?php echo $array['id'];?></span>
</div>

<?php 

}

}
}
?>
