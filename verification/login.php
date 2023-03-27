<?php

require 'C:\xampp\htdocs\hms\index.php';
require 'verificationSql.php';

$result = "";

if (isset($_POST['submit'])) {

     $result = "!";
     $result = verifyUsers();
     //print_r($result);

     if ($result != null) {
          session_start();
          $_SESSION['staff_id'] = $result[0]['staff_id'];
          $_SESSION['profession'] = $result[0]['profession'];
          $_SESSION['staff_email'] = $result[0]['staff_email'];
          $result = getUserDetails($result[0]['user_id']);
          //print_r($result);
          $_SESSION['fname'] = $result[0]['fname'];
          $_SESSION['lname'] = $result[0]['lname'];
          $result = getDep($result[0]['user_id']);
          $_SESSION['dep_name'] = $result[0]['dep_name'];
          $_SESSION['role'] = $result[1];
          //print_r($result);
          header('location: \hms/navbar.php');
     } else {
          $result = 'Incorrect details';
     }
}

?>
<img class="logo" src="https://www.bdct.nhs.uk/wp-content/uploads/2019/08/NHS-logo.png">

<div class="col-md-2 mx-auto">

     <form method="post">
          
          <div>
               <label class="control-label labelFont">Username or id</label>
               <input class="form-control" type="text" name="id">
               <span class="text-danger"></span>
          </div>
          
          <div>
               <label class="control-label labelFont">Password</label>
               <input class="form-control" type="password" name="pwd">
               <span class="text-danger"><?php $result ?></span>
          </div>
          
          <div>
               <button class="btn btn-light" style="color: blue" type="button" onclick="window.location.href = 'C:\\xampp\\htdocs\\hms\\verification\\forgotpassword.php'">Forgot Password</button>
               <input class="btn btn-primary my-2" type="submit" value="Login" name="submit">
          </div>
     </form>
</div>
     
