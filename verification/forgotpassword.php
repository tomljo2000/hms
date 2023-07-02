<?php

require 'C:\xampp\htdocs\hms\index.php';
require 'verificationSql.php';

$error = "";

if (isset($_POST['submit'])) {
     pwdReset();

     
?>

<img class="logo" src="https://www.bdct.nhs.uk/wp-content/uploads/2019/08/NHS-logo.png">

<div class="col-md-2 mx-auto">
     <form method="post">
          <p> Please input details to request password change </p>
          <br> 
          <div>
               <label class="control-label labelFont">Username or id</label>
               <input class="form-control" type="text" name="id">
               <span class="text-danger"></span>
          </div>
          <br>
          <span> OR </span>
          <div>
          <br>

               <label class="control-label labelFont">Email</label>
               <input class="form-control" type="text" name="email">
               <span class="text-danger"></span>
          </div>
          <div>
               <input class="btn btn-primary my-2" type="submit" value="Reset Pwd" name="submit" onclick="alert('Passowrd reset request send. If not recived please contact admin +44 ## ## #### ####')">
               <a href="#" onclick="alert('Please contact admin +## ## #### ####')">Help</a>
          </div>
          <span> <?php echo $error ?> </span>
     </form>
</div>

<?php

?>