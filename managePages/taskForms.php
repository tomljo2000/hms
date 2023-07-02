<?php
require '../navbar.php';
if(isset($_GET['delete'])){
    deleteRow('task_form', 'task_form_id', $_GET['delete']);
}
$tableData = getTable('task_form', null, null);
?>
<div class="mainpage">
    <div class="content">
        <div class="cHeaderTitle">
            <h1>Task Forms</h1>
            <span>Select and mange form<span>
        </div>
        <div class="cBody">
            <table id="myTable" class='table table-striped table-bordered table-hover table-responsive'>
                <thead>
                    <tr>
                        <th scope='col'>Form name:</th>
                        <th scope="col">Description</th>
                        <th scope="col">Scope</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($tableData as $key => $value) {
                    $tempData = "";
                    echo "<tr>";
                    foreach ($value as $keyData => $data) {
                        if ($keyData == 'task_form_id' || $keyData == 'form_data') {
                        } else {
                            echo "<td>" . $data . "</td>";
                            
                        }
                    }
                    echo "<td> <a href='../editPages/taskForm.php?form_id=" . $value['task_form_id'] . "'>Edit</a><span> | </span>
                                <a href='../managePages/taskForms.php?delete=" . $value['task_form_id'] . "'>Delete</a>
                            </td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require '../footer.php'; ?>