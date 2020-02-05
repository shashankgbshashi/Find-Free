<?php
include './basic/include.php';
 include './basic/security.php';?>

<html>
    <head>
        
    </head>
    <style>
        nav{
            background-color:#F5F5DC;
        }
            
            
            .card:hover{
                box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
            }
            .like-btn{
                cursor: pointer;
            }
            .dislike_btn{
                cursor: pointer;
            }
            @media only screen and (max-width: 415px){
                #result{
                position: absolute;width: 100%;background-color: rgba(0.5,0,0,0.5);
                z-index: 2;left: 0%;
            }

/*                nav{
                    width: 100%;
                }*/
                #name_frnd{
                    width: 200px;position: relative;left: 0px;text-align: left;display: inline;top: -50px;
                }
                
            }
            @media only screen and (min-width: 416px) and (max-width:960px){
                #result{
                position: fixed;width: 400px;background-color: rgba(0.5,0,0,0.5);
                z-index: 2;left: 25%;
            }
            }
            @media only screen and (min-width: 961px){
                #name_frnd{
                    width: 200px;position: relative;left: -100px;text-align: left;display: inline;top: -50px;
                }
                #result{
                position: fixed;width: 400px;background-color: white;color: white;
                z-index: 2;left: 38%;
            }
            }
    </style>
    <body>
        
<!--        <div class="header">
                <h3 style="margin-left:20px;margin-top: 10px;">Find Free</h3>
                <form action="search.php" method="post">
                    <input type="text" name="name" placeholder="Search" id="name"
                           style="position:absolute;top: 50px;font-family: cursive;left: 400px;"
                           >
                    
                </form>
                <div class="login">
                    
                        
                        <a href="home.php">
                            <i class="fa fa-user" aria-hidden="true" style="position:absolute;top: 50px;left:70%; font-size: 25px;"></i>
                        </a>
                        <a href="message_list.php">
                            <i class="fa fa-paper-plane" aria-hidden="true" style="position:absolute;top: 50px;left: 1200px; font-size: 25px;"></i>
                        </a>
                        
                    <form action="others_profile.php" method="post">
                        <input type="number" name="id" id="friend" placeholder="id" 
                               style="position:absolute;top: 50px;left: 45%;width: 50px;">
                        <input type="submit" name="friend_submit" value="sub" class="btn btn-primary"
                                style="position:absolute;top: 45px;left: 50%;width: 50px;">
                    </form>
                </div>
        </div>-->

<nav class="navbar navbar-expand-lg navbar-light">
           <div class="container">
  <a class="navbar-brand" href="#">Find Free</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
        
        <li class="nav-item active" style="margin-left:100px;margin-top: 10px;">
                            <form action="search.php" method="post">
                    <input type="text" name="name" placeholder="Search" id="name"
                           
                           >
                    
                </form>
      </li>
      <li class="nav-item active" style="margin-left:100px;margin-top: 10px;">
          <form action="others_profile.php" method="post">
                        <input type="number" name="id" id="friend" placeholder="id" 
                              >
                        <input type="submit" name="friend_submit" value="sub" class="btn btn-primary"
                               style="margin-left:50px;" >
                    </form>
      </li>
      <li class="nav-item active" style="margin-left:100px;margin-top: 10px;">
          <a href="home.php">
              <i class="fa fa-user" aria-hidden="true" style="font-size: 25px;"></i>
                        </a>
                        <a href="message_list.php">
                            <i class="fa fa-paper-plane" aria-hidden="true" style="font-size: 25px;margin-left:50px;margin-top: 10px;"></i>
                        </a>
      </li>
      
        
    </ul>
  </div>
           </div>
</nav>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    
                </div>
                <div class="col-sm-6">
                    <center>
                        <?php
                        $connect = mysqli_connect("localhost","root","","findfree");
                        $id = $_SESSION['id'];
                        $select_frnd = "SELECT * FROM `friends` WHERE `id1` = $id || `id2` = $id ";
                        $result_frnd = mysqli_query($connect, $select_frnd);
                        $row_frnd = mysqli_num_rows($result_frnd);
                        mysqli_close($connect);
                        if($row_frnd!=0){
                            while($array_frnd = mysqli_fetch_array($result_frnd)){
                                if($array_frnd['id1'] == $id)
                                    $frnd_id = $array_frnd['id2'];
                                else {
                                    $frnd_id = $array_frnd['id1'];    
                                }
                                $connect = mysqli_connect("localhost","root","","findfree");
                                $select_user_frnd = "SELECT * FROM `user` WHERE `id` = $frnd_id";
                                $result_user_frnd = mysqli_query($connect, $select_user_frnd);
                                mysqli_close($connect);
                                $array_frnd_user = mysqli_fetch_array($result_user_frnd);
                                
                                $connect = mysqli_connect("localhost","root","","findfree");

                               $select_profile = "SELECT * FROM `profile` WHERE `id` = $frnd_id ORDER BY `uid` DESC";
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
                                          
                                
                                
                               
                                $connect = mysqli_connect("localhost","root","","findfree");
                                $select_frnd_profile = "SELECT * FROM `photo` WHERE `id` = $frnd_id ORDER BY `uid` DESC";
                                $result_profile = mysqli_query($connect, $select_frnd_profile);
                                mysqli_close($connect);
                                while($array_profile = mysqli_fetch_array($result_profile)){
                                    if($array_profile['date']<10){
                                        $array_profile['date'] = "0".$array_profile['date'];
                                    }
                                    if($array_profile['month']<10){
                                        $array_profile['month'] = "0".$array_profile['month'];
                                    }
                                    $photo_id = $array_profile['uid'];
                                    
                                    $connect = mysqli_connect("localhost","root","","findfree");
                                    $select_like = "SELECT * FROM `likes` WHERE `user_id` = $id && `photo_id` = $photo_id";
                                    $result_like = mysqli_query($connect,$select_like);
                                    $rows_like = mysqli_num_rows($result_like);
                                    mysqli_close($connect);
                                    
                                    /*$connect = mysqli_connect("localhost","root","","findfree");
                                    $select_dislike = "SELECT * FROM `dislike` WHERE `user_id` = $id && `photo_id` = $photo_id";
                                    $result_dislike = mysqli_query($connect,$select_dislike);
                                    $rows_dislike = mysqli_num_rows($result_dislike);
                                    mysqli_close($connect);*/
                                    
                                    $connect = mysqli_connect("localhost","root","","findfree");
                                    $select_like_no = "SELECT * FROM `likes` WHERE `photo_id` = $photo_id";
                                    $result_like_no = mysqli_query($connect,$select_like_no);
                                    $rows_like_no = mysqli_num_rows($result_like_no);
                                    mysqli_close($connect);
                                    
                                    
                                    
                                    
                                    ?>
                        
                        <div class="card" style="margin-bottom:30px;">
                            <p style="text-align:left;margin: 20px;position: relative;left: 0px">
                            <img src="<?php
                            echo "./".$array_frnd_profile['year']."/".$array_frnd_profile['month']."/".$array_frnd_profile['date']."/".$array_frnd_profile['name'];
                            ?>" alt="image" title="image" width="30" height="30" style="border-radius:50%;"></p>
                            <h6 id="name_frnd"><?php echo $array_frnd_user['name']; ?></h6>
                            <img src="<?php
                            echo "./".$array_profile['year']."/".$array_profile['month']."/".$array_profile['date']."/".$array_profile['name'];
                            ?>" alt="image" title="image" class="card-img-top">
                            <div class="card-body">
                                
                                <?php
                                if($rows_like != 0){
                                ?>
                                <i class="fa fa-thumbs-up like-btn " data-id="<?php
                            echo $array_profile['uid'];
                            ?>" style="font-size: 25px;float: left;color: blue;"></i>
                            <?php
                                }else{
                            ?>
                            <i class="fa fa-thumbs-up like-btn " data-id="<?php
                            echo $array_profile['uid'];
                            ?>" style="font-size: 25px;float: left;"></i>
                                <?php
                                }?>
                            <i class="fa fa-thumbs-down dislike_btn " data-id="<?php
                            echo $array_profile['uid'];
                            ?>" style="font-size: 25px;"></i>
                            <i class="fa fa-comments comments"  data-id="<?php
                            echo $array_profile['uid'];
                            ?>" style="font-size: 25px;margin-left: 150px;cursor: pointer;"></i>
                                
                                <br>
                            <p style="display:inline;float: left;">Like</p>
                            <p style="display:inline;margin-left: -150px;">Dislike</p> <br>
                            <p style="display:inline;float: left;margin-bottom: 10px;" id='like_text'><?php
                            echo $rows_like_no;
                            ?></p>
                            <hr>
                            </div>
                            
                            <div class="card_footer">
                                <div id="comment_photo">
                                    
                                </div>
                                <form action="insert_comment" method="post">
                                    <div class="form-group" style="margin:30px;">
                                        <input type="text" name="comment" placeholder="comment" class="form-control"><br><br>
                                        <button type="button" class="btn btn-outline-primary form-control send_com" 
                                                data-id="<?php echo $array_profile['uid']; ?>">Send</button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                            
                        

                        <?php
                                    
                                    
                                }
                                
                            }
                        }
                        
                        
                        
                        
                        
                        ?>
                    </center> 
                </div>
                <div id="result">
            
        </div>
                            </div>
             

        </div>      
        

        

    </body>
    <script type="text/javascript">

        $('#result').hide();
        $('.card_footer').hide();
        $('#name').keyup(function(){
            if($(this).val() == ''){
                $('#result').hide();
            }else{
                $('#result').show();
            }
            var name = $(this).val();
            $.post('search.php',{name:name},function(data){
            //$.post('search',{name:name},function(data){
                console.log(data);
                $('#result').html(data);
            });
        });
        
        
    
        $('.like-btn').click(function(){
            var like_no;
            var id = $(this).data('id');
            $(this).css('color','blue');
            console.log($(this).siblings().eq(5));
            var like = $(this).siblings().eq(6);
            $.post('check_like.php',{id:id},function(data){
               // console.log(data);
                if(data == 0){
                    like_no = like.text();
                    like_no = parseInt(like_no);
                    like_no = like_no + 1;
                    like.text(like_no);
                    
                    $.post('like.php',{id:id},function(){
                        
                        
                    });       
                }else{
                    console.log('before');
                    $(this).css('color','blue');
                }
            });
        });
        
                $('.dislike_btn').click(function(){
                    var like_no;
                    console.log($(this).siblings());
                    var like = $(this).siblings().eq(6);
                    $(this).siblings().eq(0).css('color','black');
            var id = $(this).data('id');
           // $(this).css('color','blue');
            $.post('check_like.php',{id:id},function(data){
                console.log(data);
                if(data == 1){
                    //console.log('now');
                    //$(this).css('color','blue');
                    like_no = like.text();
                    like_no = parseInt(like_no);
                    like_no = like_no - 1;
                    like.text(like_no);
                    $.post('delete_like.php',{id:id},function(){
                        
                        
                    });       
                }else{
                    //console.log('before');
                    //$(this).css('color','blue');
                }
            });
        });
        
        
        $('.comments').click(function(){
            console.log('hello');
            console.log($(this).parent().siblings());
            if($(this).parent().siblings().eq(3).is(':visible'))
                $(this).parent().siblings().eq(3).hide();
            else{
                $(this).parent().siblings().eq(3).show();
                console.log($(this).parent().siblings().eq(3).children().eq(0));
                var comment = $(this).parent().siblings().eq(3).children().eq(0);
                console.log(comment);
                var id = $(this).data('id');
                console.log(id);
                $.post('get_comments.php',{id:id},function(data){
                    console.log(data);
                    comment.html(data);
                    
                })
            }
        });
        
        $('.send_com').click(function(){
            var id = $(this).data('id');
            console.log(id);
            console.log($(this).siblings());
            var text = $(this).siblings().eq(0).val();
            var add_comment = $(this).parent().parent().siblings().eq(0);
            $(this).siblings().eq(0).val('');
            $.post('add_comment.php',{id:id,text:text},function(){
                
            });
            console.log($(this).parent().parent().siblings().eq(0));
            add_comment.append(text);
            
            
            console.log(text);
        });
        

        
            
    </script>
</html>




                            
                                    

