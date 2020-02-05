<?php
include './basic/include.php';
 include './basic/security.php';
 if(!isset($_SESSION['work'])){
     $_SESSION['work'] = "";
 }
  if(!isset($_SESSION['relation'])){
     $_SESSION['relation'] = "";
 }
  if(!isset($_SESSION['thought'])){
     $_SESSION['thought'] = "";
 }
  if(!isset($_SESSION['dob_date'])){
     $_SESSION['dob_date'] = "";
 }
  if(!isset($_SESSION['dob_month'])){
     $_SESSION['dob_month'] = "";
 }
  if(!isset($_SESSION['dob_year'])){
     $_SESSION['dob_year'] = "";
 }

?>

<html>
    <style>
        body{
            font-family: cursive;background-color: rgb(246,242,242);
        }
/*        .about{
            position: fixed;left: 30%;top: 100px;border: 1px solid;
            width: 400px;
        }*/
form{
    border: 1px solid;margin-top: 50px;
}
        .form-group{
            padding: 10px;
        }
    </style>
    
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    
                </div>
                <div class="col-sm-6">
                     <form method="post" action="aboutphp.php">
                <div class="form-group">
                    <p>Work Status:</p>
                    <input type="text" placeholder="work status" name="ws" id="ws" class="form-control"
                           value="<?php echo $_SESSION['work']?>">
                </div>
                <div class="form-group">
                    <p>Relation Status:</p>
                    <input type="text" placeholder="work status" name="rs" id="rs" class="form-control"
                           value="<?php echo $_SESSION['relation']?>">
                </div>
                <div class="form-group">
                    <p>Date of Birth</p>
                    <label>Date</label>
                    <input type="number" name="date" placeholder="date" style="width: 70px;"
                           value="<?php echo $_SESSION['dob_date']?>"> 
                    <label>Month</label>
                    <input type="number" name="month" placeholder="month" style="width: 70px;"
                           value="<?php echo $_SESSION['dob_month']?>"> 

                    <label>Year</label>
                    <input type="number" name="year" placeholder="Year" style="width: 70px;"
                           value="<?php echo $_SESSION['dob_year']?>"> 

                </div>
                <div class="form-group">
                    <p>Thought:</p>
                    <textarea placeholder="Thought" name="thought" rows="5" class="form-control"
                              value="<?php echo $_SESSION['thought']?>"></textarea>
                </div>
                
                <div class="form-group">

                <input type="submit" name="submit" value="submit" class="btn btn-primary form-control" >
                </div>
            </form>

                </div>
                <div class="col-sm-3">
                    
                </div>
                
</div>
                 
            
                   </div>
    </body>
</html>

