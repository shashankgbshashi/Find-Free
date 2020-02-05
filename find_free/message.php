<html>
    
<head>

<?php
include './basic/include.php';
 include './basic/security.php';
 if(isset($_POST['add'])){
 $frnd_id = $_SESSION['other_id'];
 $id = $_SESSION['id'];
 }
 if(isset($_POST['msg_btn'])){
     $id = $_SESSION['id'];
     $frnd_id = $_POST['frnd'];
     $_SESSION['other_id'] = $frnd_id;
     
 }
 

 ?>
</head>
<style>
  
    #other_profile_pic{
        border-radius: 50%;width: 50px;
    }
    nav{
        background-color: black;
    }
    @media only screen and (max-width: 412px){
        #other_profile_pic{
        border-radius: 50%;width: 50px;
        margin-left: 145px;
    }
    #personal{
        text-align: center;
    }
    #rec_msg{
        font-size: 10px;
    }
    #content{
        width: 300px;
    }
    nav{
        width: 100%;
    }
    }

    
</style>
<body>
    <?php
    if(isset($_POST['add'])){
        ?>
    <nav class="navbar navbar-expand-sm  navbar-dark">
                
                    <a class="navbar-brand" href="#profile_pic">Home</a>
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="container">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item active">
                            <h2 class="dropdown-item" id="personal" style="cursor:pointer;color: white">
                                <?php echo $_SESSION['other_name'];?>
                            </h2>
                        </li>
                        <li class="nav-item active">
                           <img src="<?php
       echo "./".$_SESSION['other_year_profile']."/".$_SESSION['other_month_profile']."/".$_SESSION['other_date_profile']."/".$_SESSION['other_profile_pic'];
       ?>" alt="image" title="profile" id="other_profile_pic"
                         > 
                        </li>
                        
                      </ul>
                      
                    </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                    
                  </nav>
    <?php
    }
    ?>
    
    <?php
    if(isset($_POST['msg_btn'])){
        $connect = mysqli_connect("localhost","root","","findfree");
        $select_frnd = "SELECT * FROM `user` WHERE `id` = $frnd_id";
        $result_frnd = mysqli_query($connect, $select_frnd);
        mysqli_close($connect);
        $array_frnd = mysqli_fetch_array($result_frnd);
        
            $connect = mysqli_connect("localhost","root","","findfree");

$select_profile = "SELECT * FROM `profile` WHERE `id` = $frnd_id ORDER BY `uid` DESC";
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
     <nav class="navbar navbar-expand-sm  navbar-dark">
                
                    <a class="navbar-brand" href="#profile_pic">Home</a>
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="container">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item active">
                            <h4 class="dropdown-item" id="personal" style="cursor:pointer;color: white">
                                <?php echo $array_frnd['name'];?>
                            </h4>
                        </li>
                        <li class="nav-item active">
                           <img src="<?php
       echo "./".$array_profile['year']."/".$array_profile['month']."/".$array_profile['date']."/".$array_profile['name'];
       ?>" alt="image" title="profile" id="other_profile_pic"
                         > 
                        </li>
                        
                      </ul>
                      
                    </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                    
                  </nav>

    
       <?php 
    }
    
    
    ?>
<!--    -->

<?php
$connect = mysqli_connect("localhost","root","","findfree");
$select_messages = "SELECT * FROM `message` WHERE (`to_id` = $id && `from_id` = $frnd_id) || "
        . "(`to_id` = $frnd_id && `from_id` = $id) ORDER BY `uid` ASC";
$result_msg = mysqli_query($connect, $select_messages);
$row_msg = mysqli_num_rows($result_msg);
if($row_msg!=0){
    echo $row_msg;
  while($array_msg = mysqli_fetch_array($result_msg)){
      ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6"><h4 id='rec_msg'>
        <?php
        if($array_msg['from_id'] == $id){
            echo $array_msg['content'];
        }else{
            echo '';
        }
        ?></h4>
    </div>
        <div class="col-sm-6"><h4 id='rec_msg'>
         <?php
        if($array_msg['to_id'] == $id){
            echo $array_msg['content'];
        }else{
            echo '';
        }
        ?></h4>
    </div>
    </div>
</div>

<?php
  }  
}
?>
    <hr>
    <div class="container"><h4>
    <div id="message_sent">
        <div class="row">
            
        </div>
    </div></h4>
</div>
    
    
<div id="message">
    <hr style="bottom: 100px;">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><center>
    <form method="post" action="insert_message.php">
        <textarea type="text" name="msg" placeholder="content" id="content" cols="50" rows="5"></textarea>
        <!--<i class="fa fa-paper-plane" aria-hidden="true" id="send" style="font-size: 40px;"></i>-->
        <button type="button" class="btn btn-outline-primary" id="send">Send</button>
    
    </form></center>
        </div></div>
</div>

<script type="text/javascript">
$('#send').on('click',function(){
  // console.log($('input').val()); 
   var msg = $('textarea').val();
   //console.log(msg);
   if(msg != ''){
       $.post('insert_message.php',{msg:msg},function(data){
           //msg.css('display','inline');
      $('#message_sent').append(msg);
      $('#message_sent').append('<br>');
      $('textarea').val('');
  });
   }
  
});
    
    
</script>
</body>
</html>