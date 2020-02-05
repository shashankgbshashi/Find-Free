
<!--<html>
    <style>
                body{
            background-image: url("https://www.hdwallpaper.nu/wp-content/uploads/2016/12/dice-16.jpg");
        }
    </style>
    <body>
       <div id="profile">
    
    <h3 id="profile_text">please upload your profile picture</h3>
    <h3 id="profile_update_text">Your profile has been updated</h3>
    <br><br>
    <form method="post" action="file.php" enctype="multipart/form-data">                   
   <input type="hidden" name="size" value="30000000000000000">
   <input type="file" name="upload" value="" style="background-color:black;color: white">
        <input type="submit" name="submit_profile" value="upload" style="background-color:black;color: white"
               id="submit_profile">
        </form>
</div><br><br> 
    </body>
</html>-->

<?php
include './basic/include.php';
 include './basic/security.php';

 
?>
<html>
    <style>
        body{
            background-image: url("https://www.hdwallpaper.nu/wp-content/uploads/2016/12/dice-16.jpg");
            background-repeat: no-repeat;
        }
        
        #info{
            background-image: url('https://cdn.pixabay.com/photo/2018/03/15/16/11/background-3228704__340.jpg');
            width: 100%;height: 100%;
        }
    </style>
    <body>
<div id="background">
    <div class="container">
        <marquee behavior="scroll" direction="left" style="margin-top:50px;"
                  id="contact"><h3><b>Welcome to findFree Social network</b></h3></marquee><br><br>
        <div class="row" style="margin-top:100px;">
        <div class="col-sm-2">
            
        </div>
                <div class="col-sm-4" style="border:1px solid;height: 500px;border-top-left-radius: 20px;border-bottom-left-radius: 20px" id="info">
                    
                    
                    
                </div>
            <div class="col-sm-4" style="border:1px solid;height: 500px;;border-top-right-radius: 20px;border-bottom-right-radius: 20px">
<!--                <div class="info" style="padding-top:100px;margin: 20px;">
                    <h3 id="background_text">please upload Your Background Pic</h3>
    <br><br>
    <form method="post" action="file.php" enctype="multipart/form-data">                   
   <input type="hidden" name="size" value="30000000000000000">
   <input type="file" name="upload" value="" style="background-color:black;color: white">
        <input type="submit" name="submit_back" value="upload" style="background-color:black;color: white" 
               id="submit_back">
    </form></div>-->
<div class="info" style="padding-top:100px;margin: 20px;">
                    <h3 id="background_text">please upload Your Profile Pic</h3>
    <br><br>
    <form method="post" action="file.php" enctype="multipart/form-data">                   
   <input type="hidden" name="size" value="30000000000000000">
   <input type="file" name="upload" value="" hidden="hidden" id="file">
   <button name="upload_btn" class="btn btn-outline-success" id="custom_btn" type="button">Choose</button><br>
   <span id="custom">No file choosen yet</span><br>
   <br> <button type="submit" name="submit_profile" value="upload" class="btn btn-outline-primary">Upload</button>
   
       
               
    </form></div>

           
        </div>
                <div class="col-sm-2">
                        
            
        </div>
        </div>
        
    </div>
</div><br><br>



    </body>
    <script type="text/javascript">
        
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
    </script>
</html>
