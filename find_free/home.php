<?php
include './basic/include.php';
 include './basic/security.php';
 ?>

<html>
    <head>
        
    </head>
    <style>
        body{
            font-family: cursive;
        }
/*        .header{
                ;border: 1px solid #F5F5DC;width: 1250px;
                height: 75px;margin-bottom: 20px;font-family: cursive;margin-left: 100px;margin-top: 20px;
                
            }*/
nav{
    background-color:#F5F5DC
}
            .login{
                float: right;
            }
            #background{
                width: 100%;height: 350px;background-color: wheat;
            }
            
            #upload{
                position: absolute;top:310px;
            }
            #background_pic{
                height: 350px;
                width: 100%;
            }
            #bigger_pic{
                position: fixed;top: 30px;width: 1200px;
                height: 800px;background-color: rgba(0.5,0,0,0.5);
                left: 115px;display: none;
            }
            #bigger_background_pic{
                position: absolute;top: 100px;height: 500px;width: 600px;left:200px; 
            }
            #bigger_pic1{
                position: fixed;top: 30px;width: 1200px;
                height: 800px;background-color: rgba(0.5,0,0,0.5);
                left: 115px;display: none;
            }
            #bigger_profile_pic{
                position: absolute;top: 100px;height: 500px;width: 600px;left:200px; 
            }
            @media only screen and (min-width: 961px) {
                #heading{
                    margin-top: 80px;
                }
                #profile_pic{
                    margin-top: 30px;
                }
                #photo_icon{
                    margin-left: 50px;
                }
                #about_icon{
                    margin-left: 50px;
                }
                #friend_icon{
                    margin-left: 50px;
                }
                #active_btn{
                    display: none;
                }
                
                
}
@media only screen and (max-width: 412px) {
 #photo_icon{
                    margin-left: 50px;
                }
                #about_icon{
                    margin-left: 50px;
                }
                #friend_icon{
                    margin-left: 50px;
                }
                #active_parent{
                    display: none;
                }
}
@media only screen and (min-width: 412px) and (max-width: 960px) {
 #photo_icon{
                    margin-left: 20px;
                }
                #about_icon{
                    margin-left: 20px;
                }
                #friend_icon{
                    margin-left: 20px;
                }
}
           
    </style>
    <body>
        
        <?php
        $_SESSION['visit'] = 1;
        ?>
<!--        <div class="header" id="header">
                <h3 style="margin-left:20px;margin-top: 10px;">Find Free</h3>
                <div class="login">
                    
                        <a href="profile.php">
                        <i class="fa fa-home" aria-hidden="true" style="position:absolute;top: 50px;left: 900px; font-size: 25px;" ></i>
                        </a>
                        <a href="notification.php" >
                            <i class="fa fa-window-restore" aria-hidden="true" style="position:absolute;top: 50px;left: 1050px; font-size: 25px;"
                               id="notification"></i>
                        </a>
                        <p id="number_notification"
                           style="position:absolute;top: 70px;left: 1050px; font-size: 25px;"
                           ><//?php echo $_SESSION['notification'];?></p>
                        <a href="logout.php">
                            <i class="fas fa-sign-out-alt" style="position: absolute;top:50px;left: 1200px; font-size: 25px;"></i>
                            
                        </a>
                        
                    
                </div>
        </div>-->
<nav class="navbar navbar-expand-lg navbar-light" >
           <div class="container">
  <a class="navbar-brand" href="#">Find Free</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
        
      <li class="nav-item active">
          <a href="profile.php" style="margin-left:50px;">
                        <i class="fa fa-home" aria-hidden="true" style="font-size: 25px;" ></i>
                        </a>   
<a href="notification.php" style="margin-left:50px;">
                            <i class="fa fa-window-restore" aria-hidden="true" style="font-size: 25px;"
                               id="notification"></i>
                        </a>  
           <a href="logout.php" style="margin-left:50px;">
                            <i class="fas fa-sign-out-alt" style=" font-size: 25px;"></i>
                            
                        </a>
          <a href="#" style="margin-left:50px;" id="active_btn">
                            <i class="fas fa-star" style=" font-size: 25px;"></i>
                            
                        </a>
      </li>
      
        
    </ul>
  </div>
           </div>
</nav>
       
        
        <div class="container">
            
            <div class="row">
                <div class="col-sm-8" id="col">
                    <div id="background">
                         <img src="<?php
       echo "./".$_SESSION['year_background']."/".$_SESSION['month_background']."/".$_SESSION['date_background']."/".$_SESSION['background_pic'];
       ?>" alt="image" title="cover" id="background_pic">
                        
                   
                        <div id="upload">
                 <form method="post" action="file.php" enctype="multipart/form-data">
                               <!-- <input type="hidden" name="size" value="300000000000000000000">
                                <input type="file" name="upload" value="" style="background-color:black;color: white">
                                <input type="submit" name="submit_back" value="upload" style="background-color:black;color: white" >
                  -->     
                 <input type="hidden" name="size" value="30000000000000000">
   <input type="file" name="upload" value="" hidden="hidden" id="file">
   <button name="upload_btn" class="btn btn-outline-success" id="custom_btn" type="button">Choose</button>
   <span id="custom" style="background-color:white;color: black;"
         >No file choosen yet</span>
   <button type="submit" name="submit_back" value="upload" class="btn btn-outline-primary">Upload</button>
   
       
                 </form>

                        </div>
                    </div>
                    <br>
                    <div id="profile_photo" style="border:1px solid;background-color: wheat;">
                        

       <div class="row">
           <div class="col-sm-6" style="">
               <img src="<?php
       echo "./".$_SESSION['year_profile']."/".$_SESSION['month_profile']."/".$_SESSION['date_profile']."/".$_SESSION['profile_pic'];
       ?>" alt="image" title="profile" id="profile_pic"
       style="width:100%;border-radius: 50%;padding: 10px;">
           </div>
           <div class="col-sm-6">
               <h3 id="heading"><?php echo $_SESSION['name'];?></h3>
                <h3><?php //echo $_SESSION['email'];?></h3><br>
                <a href="friends_list.php"><i class="fa fa-users" aria-hidden="true" style="font-size: 25px;" id="friend_icon"></i>
                </a>
                    <a href="about_display.php"><i class="fa fa-address-book" aria-hidden="true" style="font-size: 25px;" id="about_icon"></i>
                   </a>
                    <a href="photo.php"><i class="fa fa-film" aria-hidden="true" style="font-size: 25px;" id="photo_icon"></i>
</a>
           </div><center>
               <form method="post" action="file.php" enctype="multipart/form-data" style="margin-top:30px;">                   
   <input type="hidden" name="size" value="30000000000000000">
   <input type="file" name="upload" value="" hidden="hidden" id="file1">
   <button name="upload_btn" class="btn btn-outline-success" id="custom_btn1" type="button" style="margin-left:30px;">Choose</button>
   <span id="custom1">No file choosen yet</span>
    <button type="submit" name="submit_profile" value="upload" class="btn btn-outline-primary">Upload</button>
           </form></center>
       </div>
                </div>
                
            
                         
                
            </div>
                <div class="col-sm-3" id="active_parent">
                       <center><h3>Active</h3><br></center>
                       <div id="active" >
                           
                       </div>
                    
                </div>
        </div>
        </div>
<!--        <div id="bigger_pic" class="hide">
            <img src="<?php
      // echo "./".$_SESSION['year_background']."/".$_SESSION['month_background']."/".$_SESSION['date_background']."/".$_SESSION['background_pic'];
       ?>" alt="image" title="cover"
                 id="bigger_background_pic">
        </div>
            <div id="bigger_pic1" class="hide">
                 <img src="<?php
      // echo "./".$_SESSION['year_profile']."/".$_SESSION['month_profile']."/".$_SESSION['date_profile']."/".$_SESSION['profile_pic'];
       ?>" alt="image" title="profile"
                 id="bigger_profile_pic">
        </div>-->
           

         
        
        
        
    </body>
    <script type="text/javascript">
         $('#number_notification').hide();
        $('#background_pic').on('click',function(){
            
            console.log($(this).src);
            
            $('#bigger_pic').show();
        });
        $('#bigger_pic').on('click',function(){
            $('#bigger_pic').hide();
        });
        $('#profile_pic').on('click',function(){
            
            console.log($(this).src);
            
            $('#bigger_pic1').show();
        });
        $('#bigger_pic1').on('click',function(){
            $('#bigger_pic1').hide();
        });
        $('#notification').mousemove(function(){
             $('#number_notification').show();
        });
        $('#notification').mouseout(function(){
             $('#number_notification').hide();
        });
        
       /* $('#notification').hover(function(){
            //$('#number_notification').show();
            if($('#number_notification').is(':visible'))
                $('#number_notification').hide();
            else
                $('#number_notification').show();
        })*/
    
         $.post("active_friends.php","",function(data){
             console.log(data);
            $('#active').html(data);
        });
        
        
        $('#custom_btn').click(function(){
        console.log('hello');
        $('#file').click();
    });
    $('#file').change(function(){
        if($(this).val()){
            var text = $(this).val();
            $('#custom').text(text);
        }else{
            $('#custom').text("no file");
            
        }
    });
    
            $('#custom_btn1').click(function(){
        console.log('hello');
        $('#file1').click();
    });
    $('#file1').change(function(){
        if($(this).val()){
            var text = $(this).val();
            $('#custom1').text(text);
        }else{
            $('#custom1').text("no file");
            
        }
    });
    $('#active_btn').click(function(){
        if($('#active_parent').is(':visible')){
            console.log('clicl');
            $('#active_parent').hide();
            $('#col').fadeIn(1000);
        }else{
            $('#col').hide();
            $('#active_parent').fadeIn(1000);
            console.log('clicked');
        }
    });
    </script>
</html>