<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        include './basic/include.php';
        ?>
        
            </head>
    <style>
        body{
            background-image: url('https://st4.depositphotos.com/1008648/21140/i/1600/depositphotos_211402072-stock-photo-businessman-blurred-background-drawing-thin.jpg');
            background-repeat: no-repeat;
            font-family: Arial,Helvetica,sans-serif;
            background-size: cover;background-position: center;
        }
        nav{
            background-color:#F5F5DC;
        }
        .cover{
            margin-top: 100px;
        }
        #form{
           
        }
        #signup_form{
            margin: 30px;padding-bottom: 30px;
        }
        #background{
            background-image: url('https://computersciencems.com/wp-content/uploads/2018/06/can-you-get-a-masters-degree-without-a-cs-background-800x533.jpg');
            height: 500px;
        }
        #info{
            box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        }

    </style>
    <body>
       <nav class="navbar navbar-expand-lg navbar-light">
           <div class="container">
  <a class="navbar-brand" href="#">Find Free</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
        
      <li class="nav-item active">
                            <form action="login.php" method="post">
                        <label>Name:</label>
                        <input type="text" name="name" id="name"  placeholder="Name">
                        <label>password:</label>
                        <input type="password" name="password" id="password" value=""  placeholder="Password">
                        <input type="submit" value="login" class="btn btn-outline-success" name="submit" 
                               >
                            </form>
      </li>
        
    </ul>
  </div>
           </div>
</nav>
        <div class="cover">
        <div class="container">
            <div class="row" >
               <!-- <div class="col-sm-1"></div>-->
               
                
                <div class="col-sm-6" >
                    <div id="background" id="info">
                    <center>
                        <h2 style="padding-top:20%;">  Sign up</h2></center>
                    </div>
                </div>

                <div class="col-sm-6" style=" background-color: black;color: white;" id="info">
                                    <div id="form">
                    <form method="post" action="signup.php" id="signup_form" >
                        <div class="form-group">
                            <label>Name:</label>
                            <input name="name" type="text" id="name" class="form-control" placeholder="Name">
                        </div>
                            <div class="form-group">
                            <label>Phone Number:</label>
                            <input name="number" type="number" id="number" class="form-control" placeholder="Number">
                        </div>
                            <div class="form-group">
                            <label>Email:</label>
                            <input name="email" type="email" id="email" class="form-control" placeholder="Email">
                        </div>
                            <div class="form-group">
                            <label>Password:</label>
                            <input name="password" type="password" id="password" class="form-control" placeholder="Password">
                            </div><label></label>
                            <button class="btn btn-outline-primary form-control" type="submit" id="submit" name="submit">Submit</button>
                    </form>
                </div>
                </div>
                
                <!--<div class="col-sm-2"></div>-->
            </div>
        </div>
        </div>
                
        <script type="text/javascript">
            $('input').focus(function(){
                $(this).attr('placeholder','');
                $(this).css('background-color','white');
                
            })
            $('input').blur(function(){
                if($(this).val() == ''){
                    $(this).attr('placeholder','incomplete form');
                    $(this).css('background-color','rgba(255, 0, 0, 0.7)');
                }
            })
        </script>
    </body>
</html>
