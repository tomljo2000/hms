<?php 

require 'C:\xampp\htdocs\hms\index.php'; 
require 'verificationSql.php'; 

$result = "";

if (isset($_POST['submit'])) {

     $result = "!";
     $result = verifyUsers(); 

     if ($result == false)
     {
          $result = "FAIL";
     }
}

?>


<div class="float">
     <img class="float-left" src="nhs.png" width="200" height="80">
</div>

<div class="container min-vh-100 d-flex justify-content-center align-items-center">
     <div class="mb 3">
          <form method="post">
               <div>
                    <label class="control-label labelFont">Username or id</label>
                    <input class="form-control" type="text" name="id">
                    <span class="text-danger"></span>
               </div>

               <div>
                    <label class="control-label labelFont">Password</label>
                    <input class="form-control" type="password" name="pwd">
                    <span class="text-danger"></span>
               </div>
               <div>
                    <label class="control-label labelFont">Password</label>
                    <input class="form-control" type="password" name="pwd">
                    <span class="text-danger"></span>
               </div>
               <div>
                    <label class="control-label labelFont">Password</label>
                    <input class="form-control" type="password" name="pwd">
                    <span class="text-danger"></span>
               </div>

               <div>
                    <input class="btn btn-primary my-2" type="submit" value="Login" name="submit">
               </div>
          </form>
     </div>
</div>