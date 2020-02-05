<?php
include './basic/security.php';
if(isset($_POST['delete'])){
    $id = $_SESSION['id'];
    $frnd_id = $_POST['id'];
    $connect = mysqli_connect("localhost","root","","findfree");
    $delete = "DELETE FROM `friends` WHERE (`id1` = $id && `id2` = $frnd_id)"
            . "|| (`id2` = $id && `id1` = $frnd_id)";
    $result = mysqli_query($connect, $delete);
    echo '<script>window.location.href="friends_list.php"</script>';
    
}
?>