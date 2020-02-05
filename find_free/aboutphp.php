<?php

include './basic/include.php';
 include './basic/security.php';
$connect = mysqli_connect("localhost","root","","findfree");
$work = $_POST['ws'];
$id = $_SESSION['id'];
$relation = $_POST['rs'];

$date = $_POST['date'];
$month = $_POST['month'];
$year = $_POST['year'];
$thought = $_POST['thought'];
if($date == ''){
   $date = 0;
}
if($month == ''){
   $month = 0;
}
if($year == ''){
   $year = 0;
}
if($_SESSION['visit'] == 0){
$insert = "INSERT INTO `about`(`id`, `date`, `month`, `year`, `work`, `relation`, `thought`) VALUES"
        . "($id,$date,$month,$year,'$work','$relation','$thought')";
} else {
$insert = "UPDATE `about` SET `date` = $date,`month` = $month,`year` = $year,`work` = '$work',"
        . "`relation` = '$relation',`thought` = '$thought' WHERE `id` = $id";    
}

$result = mysqli_query($connect, $insert);
//var_dump($result);
if($result){
    $_SESSION['work'] = $work;
    $_SESSION['relation'] = $relation;
    $_SESSION['dob_date'] = $date;
    $_SESSION['dob_month'] = $month;
    $_SESSION['dob_year'] = $year;
    $_SESSION['thought'] = $thought;
    mysqli_close($connect);
    //var_dump($_SESSION);
    echo "<script>window.location.href='home.php'</script>"; 
}
?>