<?php

include './basic/include.php';
 include './basic/security.php';
if(isset($_POST['friend_submit'])){
    if(!empty($_POST['id'])){
        $id = $_POST['id'];
        if($id == $_SESSION['id']){
            echo '<script>window.location.href="profile.php"</script>';
        }
        $connect = mysqli_connect("localhost","root","","findfree");
        $select = "SELECT * FROM `user` WHERE `id` = $id";
        $result = mysqli_query($connect, $select);
        $rows = mysqli_num_rows($result);
        if($rows == 0){
            echo '<script>window.location.href="profile.php"</script>';
        }
        $array = mysqli_fetch_array($result);
        mysqli_close($connect);
        
        
        $connect = mysqli_connect("localhost","root","","findfree");
        
        $select_background = "SELECT * FROM `backgroud_pic` WHERE `id` = $id";
        $result_background = mysqli_query($connect, $select_background);
        
$array_background = mysqli_fetch_array($result_background);
while($array_ba = mysqli_fetch_array($result_background)){
    if($array_background['uid'] < $array_ba['uid']){
        $array_background = $array_ba;
    }
}
        mysqli_close($connect);
        
        
       /* $connect = mysqli_connect("localhost","root","","findfree");

        $select_profile = "SELECT * FROM `profile` WHERE `id` = $id";
        $result_profile = mysqli_query($connect, $select_profile);
        while($array_pro = mysqli_fetch_array($result_profile)){
            $array_profile = $array_pro;
        }
        var_dump($array_profile);

        mysqli_close($connect);*/
        
        $connect = mysqli_connect("localhost","root","","findfree");

        $select_profile = "SELECT * FROM `profile` WHERE `id` = $id";
        $result_profile = mysqli_query($connect, $select_profile);
        $array_profile = mysqli_fetch_array($result_profile);
        while($array_pro = mysqli_fetch_array($result_profile)){
    if($array_profile['uid'] < $array_pro['uid']){
        $array_profile = $array_pro;
    }
}
        //var_dump($array_profile);
//var_dump($array_background);
        mysqli_close($connect);
               
        if($result && $result_background && $result_profile){
            $_SESSION['other_id'] = $id;
            $_SESSION['other_name'] = $array['name'];
            $_SESSION['other_email'] = $array['email'];
            if($array_profile['date']<10){
                $_SESSION['other_date_profile'] = "0".$array_profile['date'];
            } else {
                $_SESSION['other_date_profile'] = $array_profile['date'];
            }
            if($array_profile['month']<10){
                $_SESSION['other_month_profile'] = "0".$array_profile['month'];
            } else {
                $_SESSION['other_month_profile'] = $array_profile['month'];
            }
            
            
            
            $_SESSION['other_year_profile'] = $array_profile['year'];
            $_SESSION['other_profile_pic'] = $array_profile['name'];
            
            if($array_background['date']<10){
                $_SESSION['other_date_background'] = "0".$array_background['date'];
            } else {
                $_SESSION['other_date_background'] = $array_background['date'];
            }
            if($array_background['month']<10){
                $_SESSION['other_month_background'] = "0".$array_background['month'];
            } else {
                $_SESSION['other_month_background'] = $array_background['month'];
            }
            
            $_SESSION['other_year_background'] = $array_background['year'];
            $_SESSION['other_background_pic'] = $array_background['name'];
        //    var_dump($_SESSION);
            echo "<script>window.location.href='others_profile_html.php'</script>"; 
        }   
    }
}
?>
