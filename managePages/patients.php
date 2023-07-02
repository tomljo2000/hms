<?php
require '../navbar.php';
$tableData = getAllPatientsData();
?>
<div class="mainpage">
    <div class="content">
        <div class="cHeaderTitle">
            <h1>PATIENTS</h1>
            <span>Search and select patients</span>
        </div>
        
        <div class="cBody">
            <table id="myTable" class='table table-striped table-bordered table-hover table-responsive'>
                <thead>
                    <tr>
                        <th scope='col'>Fore name:<br>
                            <input type="text" class="search" id="fname" onkeyup="search('fname',0);" placeholder="First name....">
                        </th>
                        <th scope="col">Last name:<br>
                            <input type="text" class="search" id="lname" onkeyup="search('lname',1);" placeholder="Last name....">
                        </th>
                        <th scope="col">email</th>
                        <th scope="col">Adress</th>
                        <th scope="col">Post Code</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Date of Birth
                            <button id="filter" class="up" onclick="sortDob(6);"></button>
                        </th>
                        <th scope="col">Sex</th>
                        <th scope='col'>NHS no
                            <input type="text" class="search" id="nhsNo" onkeyup="search('nhsNo',8);" placeholder="Search NHS no....">
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($tableData as $key => $value) {
                    $tempData = "";
                    echo "<tr>";
                    foreach ($value as $keyData => $data) {
                        if ($keyData == 'user_id' || $keyData == '1') {
                        } else {
                            if ($keyData == 'nhs_no') {
                                echo "<td><a href='../editPages/patient.php?nhs_no=" . $data . "'>" . $data . "</a></td>";
                            } else {
                                echo "<td>" . $data . "</td>";
                            }
                        }
                    }
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require '../footer.php'; ?>