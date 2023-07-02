<?php
require '../navbar.php';
$tableData = getTable('department', null, null);
?>
<div class="mainpage">
    <div class="content">
        <div class="cHeaderTitle">
            <h1>DEPARTMENTS</h1>
            <span>Search and select department</span>
        </div>
        <div class="cBody">
            <table id="myTable" class='table table-striped table-bordered table-hover table-responsive'>
                <thead>
                    <tr>
                        <th scope='col'>Department:<br>
                            <input type="text" class="search" id="dep" onkeyup="search('dep', 0);" placeholder="Search Department names....">
                        </th>
                        <th scope="col">Room Number
                            <button id="filter" class="up" onclick="filter();"></button>
                        </th>
                        <th scope='col'>Action</th>
                    </tr>
                </thead>
                <?php
                echo "<tbody>";
                foreach ($tableData as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['dep_name'] . "</td>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td>" . "<a href='../editPages/department.php?dep=" . $row['dep_name'] . "'>View</a> </tb>";
                    echo "</tr>";
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require '../footer.php' ?>