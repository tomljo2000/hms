<?php
require '../navbar.php';
?>

<div class="mainpage">
    <div class="content">
        <div class="cHeaderTitle">
            <h1>HOME  </h1>
            <span>Welcome <?php echo $_SESSION['fname'] ?></span>
        </div>
        <div class="cHeaderImg">
            <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="">
        </div>
        <div class="cBody">
        </div>
    </div>
</div>

<?php

require '../footer.php';
?>


