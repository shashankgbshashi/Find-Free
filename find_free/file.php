<?php

session_start();
//var_dump($_FILES);
if(!$_FILES['upload']['error']){
        switch ($_FILES['upload']['type']){
            case 'image/jpeg':
            case 'image/png' :
                break;
            default : echo 'illegal file';
                exit();
        }
        $array = explode(".", $_FILES['upload']['name']);
        $extension = array_pop($array);
        $file_name = time().rand(1000,9999).$extension;
        $dir = "./".date('Y')."/".date('m')."/".date('d');
        if(is_dir($dir)){
            $destination = $dir."/".$file_name;
        } else {
            mkdir($dir,0777,TRUE);
            $destination = $dir."/".$file_name;
        }
        if(move_uploaded_file($_FILES['upload']['tmp_name'], $destination)){
            if(isset($_POST['submit_back'])){
                $connect = mysqli_connect("localhost","root","","findfree");
                 $_SESSION['year_background'] = date('Y');
        $_SESSION['background_pic'] = $file_name;
        $_SESSION['date_background'] = date('d');
        $_SESSION['month_background'] = date('m');
               
        $date = date('d');
        $month = date('m');
        $year = date('Y');
        $id = $_SESSION['id'];
        $name = $file_name;
        
        
        $insert = "INSERT INTO `backgroud_pic`(`id`, `date`, `month`, `year`, `name`) VALUES ($id,$date,$month,$year,'$name')";
        $result = mysqli_query($connect, $insert);
        if($result){
            mysqli_close($connect);
            $connect = mysqli_connect("localhost","root","","findfree");
             $insert_photo = "INSERT INTO `photo`(`id`, `date`, `month`, `year`, `name`) VALUES ($id,$date,$month,$year,'$name')";
            $result_photo = mysqli_query($connect, $insert_photo);
            mysqli_close($connect);
            
            
            if($_SESSION['visit'] == 0){
            echo "<script>window.location.href='file_html2.php'</script>";
            } else {
                echo "<script>window.location.href='home.php'</script>";
            }
        
            
        }
            }
            if(isset($_POST['submit_profile'])){
        $connect = mysqli_connect("localhost","root","","findfree");
        $_SESSION['year_profile'] = date('Y');
        $_SESSION['profile_pic'] = $file_name;
        $_SESSION['date_profile'] = date('d');
        $_SESSION['month_profile'] = date('m');
               
        $date = date('d');
        $month = date('m');
        $year = date('Y');
        $id = $_SESSION['id'];
        $name = $file_name;
        
        
        $insert = "INSERT INTO `profile`(`id`, `date`, `month`, `year`, `name`) VALUES ($id,$date,$month,$year,'$name')";
        $result = mysqli_query($connect, $insert);
        if($result){
            mysqli_close($connect);
            $connect = mysqli_connect("localhost","root","","findfree");
             $insert_photo = "INSERT INTO `photo`(`id`, `date`, `month`, `year`, `name`) VALUES ($id,$date,$month,$year,'$name')";
            $result_photo = mysqli_query($connect, $insert_photo);
            mysqli_close($connect);
              if($_SESSION['visit'] == 0){
            echo "<script>window.location.href='about.php'</script>";
            } else {
                echo "<script>window.location.href='home.php'</script>";
            }
            
        }
            }
        } else {
            echo 'not';
        }
}else{
    ?>
<script type="text/javascript">
    alert("something went wrong while uploading file,try again");

</script>
        <?php
}



?>
    
