<?php
include './basic/include.php';
 include './basic/security.php';?>



<html>
    <head>
        
    </head>
    <style>
        body{
            font-family: cursive;
        }
        .header{
                background-color:#F5F5DC;border: 1px solid #F5F5DC;width: 1250px;
                height: 75px;margin-bottom: 20px;font-family: cursive;margin-left: 100px;
                
            }
            .login{
                float: right;
            }
            #background{
                width: 100%;height: 350px;background-color: wheat;
            }

            #active_parent{
                background-color: white;position: fixed;top: 120px;left: 1000px;width: 550px;font-family: cursive;
            }
            #upload{
                position: absolute;top:320;left: 350px; 
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
                        @media only screen and (max-width: 412px){
                #home{
                    margin-left: 100px;
                } 
                #noti{
                    margin-left: 30px;
                }
                #logout{
                    margin-left: 30px;
                }
                #border{
                    border-bottom:  1px solid;
                }
                #btn-pos{
                    text-align: center;
                }
                

            }
            @media only screen and (min-width: 961px){
                #home{
                    margin-left: 100px;
                } 
                #noti{
                    margin-left: 100px;
                }
                #logout{
                    margin-left: 100px;
                }
                #border{
                    border-right: 1px solid;
                }
                #btn-pos{
                    padding-left: 20px;
                }

            }
            nav{
                background-color: #F5F5DC;
                margin-bottom: 100px;
            }
           
    </style>
    <body>
     
       <!--        <div class="header">
                <h3 style="margin-left:20px;margin-top: 10px;">Find Free</h3>
                <div class="login">
                    <form action="login.php" method="post">
                        <a href="profile.php">
                        <i class="fa fa-home" aria-hidden="true" style="position:absolute;top: 50px;left: 900px; font-size: 25px;" ></i>
                        </a>
                        <a href="#" id="notification">
                            <i class="fa fa-window-restore" aria-hidden="true" style="position:absolute;top: 50px;left: 1050px; font-size: 25px;"></i>
                        </a>
                        <a href="logout.php">
                            <i class="fas fa-sign-out-alt" style="position: absolute;top:50px;left: 1200px; font-size: 25px;"></i>
                            
                        </a>
                        
                    </form>
                </div>
        </div>-->
<nav class="navbar navbar-expand-lg navbar-light">
           <div class="container">
  <a class="navbar-brand" href="#">Find Free</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown" id="line">
    <ul class="navbar-nav ml-auto">
        
      <li class="nav-item active">
          <a href="profile.php" id="home"><i class="fa fa-home" aria-hidden="true" style="font-size:25px;"></i></a>
           <a href="#" id="noti"><i class="fa fa-window-restore" aria-hidden="true" style="font-size:25px;"></i></a>
           <a href="logout.php" id="logout"><i class="fa fa-sign-out-alt" aria-hidden="true" style="font-size:25px;"></i></a>
      </li>
        
    </ul>
  </div>
           </div>
</nav>
       
       <div class="container">
            
            <div class="row">
                <div class="col-sm-8">
                    <div id="background">
                         <img src="<?php
       echo "./".$_SESSION['other_year_background']."/".$_SESSION['other_month_background']."/".$_SESSION['other_date_background']."/".$_SESSION['other_background_pic'];
       ?>" alt="image" title="cover" id="background_pic">
                        
                   
                        
                    </div>
                    <br>
                    <div id="profile_photo" style="border:1px solid;background-color: wheat;">
                        

       <div class="row">
           <div class="col-sm-6" id="border">
              <img src="<?php
       echo "./".$_SESSION['other_year_profile']."/".$_SESSION['other_month_profile']."/".$_SESSION['other_date_profile']."/".$_SESSION['other_profile_pic'];
       ?>" alt="image" title="profile" id="profile_pic"
       style="width:100%;border-radius: 50%;padding: 10px;height: 300px;">
           </div>
           <div class="col-sm-6" style="margin-top:50px;" id="border-top">
               <h3 style="padding-left:20px;">
                        
                        <?php echo $_SESSION['other_name'];?></h3><br>
              
                                                           
                    
                    <?php
                    $connect = mysqli_connect("localhost","root","","findfree");
                    $id = $_SESSION['id'];
                    $other_id = $_SESSION['other_id'];
                    $select_friend = "SELECT * FROM `friends` WHERE (`id1` = $id && `id2` = $other_id) || (`id1` = $other_id && `id2` = $id)";
                    $result_friend = mysqli_query($connect, $select_friend);
                    $rows_friend = mysqli_num_rows($result_friend);
                    if($rows_friend == 0){
                      $connect = mysqli_connect("localhost","root","","findfree");
                      
                      $select_request = "SELECT * FROM `friend_request` WHERE `from_id` = $id && `to_id` = $other_id";
                      $result_request = mysqli_query($connect, $select_request);
                      $rows_request = mysqli_num_rows($result_request);
                      if($rows_request == 0){
                          ?>
                          <form method="post" action="friend_request.php" id="btn-pos">
                    <input type="submit" name ="add" value="Add friend" class="btn btn-primary" id="add"
                          >
                    </form>
                                     
                              <?php
                    
                      }else{
                          ?>
                    <form method="post" action="cancel_request.php" id="btn-pos">
                    <input type="submit" name ="cancel" value="Cancel friend" class="btn btn-danger" id="Cancel"
                          >
                    </form>
                    
                              
                              <?php
                      }
                          
                          
                      
                    }else {
                        ?>
                        <form method="post" action="message.php" id="btn-pos">
                    <input type="submit" name ="add" value="Message" class="btn btn-primary" id="add"
 >
                        </form>        <br>           
                   <i class="fa fa-users" aria-hidden="true" style="font-size: 25px;padding-left: 0px"></i>
                     
                   
                    <i class="fa fa-address-book" aria-hidden="true" style="font-size: 25px;padding-left: 80px"></i>
                    
                    <i class="fa fa-film" aria-hidden="true" style="font-size: 25px;padding-left: 80px"></i><br><br>
                    <h3 style="display:inline;padding-left: 0px">Friends</h3>
                    <h3 style="display:inline;padding-left: 20px">About</h3>
                    <h3 style="display:inline;padding-left: 20px">Photos</h3>
                    <br>
                    
                    <?php
                        
                    }
                    ?>
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
        </div>
       
        
            
            <script type="text/javascript">
                $('#cancel').hide();
                $('#add').on('click',function(){
                    $('#add').hide();
                    $('#cancel').show();
                });
                $('#cancel').on('click',function(){
                    $('#cancel').hide();
                    $('#add').show();
                })
                 $.post("active_friends.php","",function(data){
             console.log(data);
            $('#active').html(data);
        });
           </script>
    
   
      
        
    </body>
    
</html>
          