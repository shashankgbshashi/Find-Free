<html>
    <head>
        <?php include './basic/security.php';
        include './basic/include.php';?>
    </head>
    <style>
        nav{
            background-color: #F5F5DC;
        }
       
        @media only screen and (max-width: 412px){
            nav{
                width: 400px;
            }
            #profile{
                margin-left: 50px;
            }
            #home{
                margin-left: 50px;
            }
            #logout{
                margin-left: 50px;
            }
        }
        
        @media only screen and (min-width: 413px) and (max-width: 960px){
            #profile{
                margin-left: 50px;
            }
            #home{
                margin-left: 50px;
            }
            #logout{
                margin-left: 50px;
            }
        }
        @media only screen and (min-width: 961px){
             #active_parent{
            background-color: white;position: fixed;top: 80px;left: 1100px;
        }
        }
        
    </style>
    <body>
        <nav class="navbar navbar-expand-sm  navbar-light">
            <div class="container">
            <a class="navbar-brand" href="#" id="home">Find Free</a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
              
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto" style="font-size:  30px;">
                    
                    <li class="nav-item" >
                        <a class="nav-link" href="profile.php" style="display:inline;" id="profile">
                            <i class="fa fa-home" aria-hidden="true"></i></a>
                            <a class="nav-link" href="home.php" style="display:inline;" id="home"> 
                                <i class="fa fa-user" aria-hidden="true"></i></a>
                                 <a class="nav-link" href="logout.php" style="display:inline;" id="logout"> 
                                     <i class="fas fa-sign-out-alt" aria-hidden="true"></i></a>
                        
                            
                        </a>
                    </li>
                  
                      
                      
                   
                    </ul></div></div></nav>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <?php
                                $id = $_SESSION['id'];
                                $connect = mysqli_connect("localhost","root","","findfree");
                                $select_profile = "SELECT * FROM `photo` WHERE `id` = $id ORDER BY `uid` DESC";
                                $result_profile = mysqli_query($connect, $select_profile);
                                mysqli_close($connect);
                                while($array_profile = mysqli_fetch_array($result_profile)){
                                    if($array_profile['date']<10){
                    $array_profile['date'] = "0".$array_profile['date'];
                }
                if($array_profile['month']<10){
                    $array_profile['month'] = "0".$array_profile['month'];
                }
                                    
                                    ?>
                                <div class="card">
                                    
                                <img alt="image" title="profile" src="<?php
                                echo "./".$array_profile['year']."/".$array_profile['month']."/".$array_profile['date']."/".$array_profile['name'];
                                ?>" class="card-img-top" width="100%" height="400">
                                
                                </div>
                                <br>
                                
                                <?php
                                }
                                
                                ?>
                                
                                                                
                            </div>
                            <div class="col-sm-3" id="active_parent" style="margin-top: 50px;">
                       <center><h3>Active</h3><br></center>
                       <div id="active" >
                           
                       </div>
                    
                </div>
                        </div>
                    </div>
    </body>
    <script type="text/javascript">
                 $.post("active_friends.php","",function(data){
             console.log(data);
            $('#active').html(data);
        });
        
        </script>
        
</html>