<?php
require '../navbar.php';
$tableData = getAllStaffData();
?>
<div class="mainpage">
    <div class="content">
        <div class="cHeaderTitle">
            <h1>STAFF</h1>
            <span>Search and select staff</span>
            <?php 
    // echo '<pre>' , var_dump($tableData),'</pre>';

            ?>
        </div>
        <div class="cBody">
            <table id="myTable" class='table table-striped table-bordered table-hover table-responsive'>
                <thead>
                    <tr>
                        <th scope="col">Role</th>
                        <th scope="col">Staff ID</th>
                        <th scope="col">Department</th>
                        <th scope='col'>Fore name<br>
                            <input type="text" class="search" id="fname" onkeyup="search('fname',3);" placeholder="First name....">
                        </th>
                        <th scope="col">Last name:<br>
                            <input type="text" class="search" id="lname" onkeyup="search('lname',4);" placeholder="Last name....">
                        </th>
                        <th scope="col">Date of Birth
                            <button id="filter" class="up" onclick="sortDob(5);" style="width: 55px"></button>
                        </th>
                        <th scope="col">Sex</th>
                        <th scope="col" >National Insureance No.
                            <input type="text" style="width: 55px" class="search" id="nhsNo" onkeyup="search('nhsNo',7);" placeholder="Search NHS no....">
                        </th>    
                        <th scope="col">Profession</th>
                        <th scope="col">Pay band</th>
                        <th scope="col">Staff email</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($tableData as $key => $value) {
                    $tempData = "";
                    echo "<tr>";
                    foreach ($value as $keyData => $data) {
                        switch($keyData) {
                            case 'staff_id':
                                echo "<td><a href='../editPages/staff.php?staff_id=" . $data . "'>" . $data . "</a></td>";
                                break;
                            case 'clinician_id':
                                echo "<td> Clinician </td>";
                                break; 
                            case 'admin_id':
                                echo "<td> Admin </td>";
                                break;
                            case 'manager_id':
                                echo "<td> Manager </td>";
                                break;
                            case 'pwd':
                            case 'mobile':
                            case 'street':
                            case 'post':
                            case 'email':
                            case 'user_id':
                                break;
                            default:
                                echo "<td>" . $data . "</td>";
                                break;
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