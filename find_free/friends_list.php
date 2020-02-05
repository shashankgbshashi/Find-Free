

<html>

<?php
include './basic/include.php';
include './basic/security.php';
?>
        
<title>Find Free</title>
<style>
    body{
        background-color: rgb(246,242,242);
    }
    input{
        display: none;
    }
    .card:hover{
        box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
    }
</style>
<body>
    <div class="container">
    <div class="row">
    <?php
    $connect = mysqli_connect("localhost","root","","findfree");
    $id = $_SESSION['id'];
    //echo $id;
    $select_friend = "SELECT * FROM `friends` WHERE `id1` = $id || `id2` = $id";
    $result_friend = mysqli_query($connect, $select_friend);
    mysqli_close($connect);
    if($result_friend){
        $number_friends = mysqli_num_rows($result_friend);
        //echo $number_friends;
        if($number_friends != 0){
           while($array_friend_list = mysqli_fetch_array($result_friend)){
               if($array_friend_list['id1'] == $id){
                   $friend_id = $array_friend_list['id2'];
               } else {
                   $friend_id = $array_friend_list['id1'];
               }
               $connect = mysqli_connect("localhost","root","","findfree");
//$name = $_POST['name'];
//$password = md5($_POST['password']);
               // $friend_id;
               //echo $id;
                $select = "SELECT * FROM `user` WHERE `id` = $friend_id";
                $result = mysqli_query($connect, $select);
                $array = mysqli_fetch_array($result);
                mysqli_close($connect);
                
                
                $connect = mysqli_connect("localhost","root","","findfree");

                    $select_profile = "SELECT * FROM `profile` WHERE `id` = $friend_id ORDER BY `uid` DESC";
                           // . "ORDER BY `uid` DESC";
                   // $select_profile = "SELECT * FROM `profile` WHERE `id` = $friend_id ORDER BY `uid` DESC";
                    $result_profile = mysqli_query($connect, $select_profile);
                  //  var_dump($result_profile);
                    $array_profile = mysqli_fetch_array($result_profile);
                    
                

                mysqli_close($connect);
                if($array_profile['date']<10){
                    $array_profile['date'] = "0".$array_profile['date'];
                }
                if($array_profile['month']<10){
                    $array_profile['month'] = "0".$array_profile['month'];
                }
                ?>
        <br>
        <div class="col-sm-3">
           
                <div class="card" style="width: 15rem">
                    <img src="<?php
                    echo "./".$array_profile['year']."/".$array_profile['month']."/".$array_profile['date']."/".$array_profile['name']
                            ?>" alt="image" title="profile" class="card-img-top" style="height:200px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $array['name']?></h5>
                        <div class="card-text">
                            <h6><?php echo $array['email'];?></h6>
                            <form action="frnd_delete.php" method="post">
                                <input type="number" name="id" value="<?php echo $friend_id?>" style="display:none;">
                                <button type="submit" class="btn btn-outline-danger" name="delete">Delete</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            
        </div>
    
    
    
    <?php
    
    
           }
           
        }
    }
    ?>
    </div></div>
    <script type="text/javascript">
    $('.card').mouseover(function(){
        $(this).css('margin-top','5px');
    });
        $('.card').mouseout(function(){
        $(this).css('margin-top','-5px');
    });
    </script>
</body>

</html>