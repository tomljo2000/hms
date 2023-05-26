<?php
require '../navbar.php';


if (isset($_GET['form_id'])) {
    $data = $_GET['form_id'];
    $data = getAllFormData($data);
} else {
    // echo "<h1>No form selected</h1>";
}
$inputs = getTable('inputs', null, null);
?>


<form class="cBodyContent" action="./preview.php" method="post">
    <div style="border:none; justify-content:center">
        <div>
            <label for="fname">Select Input Type for task:</label><br>
            <select name="input_type" id="input_type">
                <script>
                    inputArray();
                </script>
            </select>
        </div>
        <div>
            <button class="btn btn-primary" onclick="render(event)">Add Input</button>
        </div>
    </div>
    
    <div id="formRender">
    </div>
    <div style="border:none; justify-content:center">
        <div class="double">
            <input type="submit" value="Submit & Preview">
        </div>
    </div>
</form>

<?php require '../footer.php'; ?>