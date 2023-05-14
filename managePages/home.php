<?php
require '../sql.php';

session_start();

if (!isset($_SESSION['staff_id'])) {
    header('location:../verification/login.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="\hms\CSS\style.css">
    <link rel="stylesheet" href="\hms\CSS\form.css">
    <link rel="stylesheet" href="\hms\CSS\table.css">
    <script src="../scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>


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
                <a class="button" href="#"><?php echo strtoupper($_SESSION['dep_name']) ?></a>
                <a class="button" href="#">MANAGE TASKS</a>
                <?php if ($_SESSION['role'] == 'clinician') : ?>

                <?php elseif (($_SESSION['role'] == 'manager')) : ?>
                    <a class="button" href="#">MANAGE STAFF</a>
                <?php else : ?>

                <?php endif; ?>
                <a class="button" href="#">PACIENT SEARCH</a>
                <a class="button" href="../verification/login.php">LOGOUT</a>
            </div>
        </div>
        <!-- page content -->
        <div class="mainpage">
            <div class="content">
                <div class="cHeaderTitle">
                    <h1>Create Tasks</h1>
                    <span>Add tasks to the database</span>
                </div>
                <div class="cHeaderImg">
                    <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="">
                </div>
                <div class="cBody">
                    <script>
                        var data = {
                            resource_id: 'EPD_202302', // the resource id
                            limit: 5, // get 5 results
                            q: 'NEWCASTLE UPON TYNE' // query for 'jones'
                        };
                        $.ajax({
                            url: 'https://opendata.nhsbsa.net/api/3/action/datastore_search',
                            data: data,
                            dataType: 'jsonp',
                            success: function(data) {
                                alert('Total results found: ' + data.result.total)
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        <!-- footer -->
    </div>
</body>