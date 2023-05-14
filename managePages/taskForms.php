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
            <h1>Create Tasks</h1>
            <span>Add tasks to the database</span>
        </div>
        <div class="cHeaderImg">
            <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="">
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
                        if ($keyData == 'task_form_id') {
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