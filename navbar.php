<?php
require 'index.php';
require 'sql.php';

session_start();

if (!isset($_SESSION['staff_id'])) {
  header('location:../verification/login.php');
}
?>

<div class="container">
  <div class="null-sidebar"></div>
  <div class="sidebar">
    <img class="logo" src="https://www.bdct.nhs.uk/wp-content/uploads/2019/08/NHS-logo.png">
    <div class="item">
      <div>
        <p><?php echo ucfirst($_SESSION['role']) . ": " . $_SESSION['profession'] ?></p>
        <h4>
          <?php
          if ($_SESSION['profession'] == "Doctor") {
            echo ("Dr");
          }
          echo ($_SESSION['fname'] . " " . $_SESSION['lname'])
          ?>
        </h4>
        <p><?php echo $_SESSION['staff_id'] ?></p>
      </div>
      <a class="button" href="../managePages/home.php">HOME</a>
      <a class="button" href="../managePages/departments.php">DEPS</a>
      <a class="button" href="../managePages/patients.php">PATIENT</a>
      <a class="button" href="../managePages/staff.php">STAFF</a>
      <a class="button" href="#"><?php echo strtoupper($_SESSION['dep_name']) ?></a>
      <a class="button" href="../managePages/taskForms.php">MANAGE TASKS FORMS</a>
      <?php if ($_SESSION['role'] == 'clinician') : ?>

      <?php elseif (($_SESSION['role'] == 'manager')) : ?>
        <a class="button" href="#">MANAGE STAFF</a>
      <?php else : ?>

      <?php endif; ?>
      <a class="button" href="#">PACIENT SEARCH</a>
      <a class="button" href="../verification/login.php">LOGOUT</a>
    </div>
  </div>
