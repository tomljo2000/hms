<?php
require '../navbar.php';

if (isset($_GET['form_id'])) {
    $data = $_GET['form_id'];
    $data = getAllFormData($data);
} else {
    // echo "<h1>No form selected</h1>";
}
// var_dump($data[0]['form_data']); 
$data = $data[0]['form_data'];
$array = unserialize($data);

// var_dump($array);

?>
<script>
    var js_obj_data = <?php echo json_encode($array); ?>;
</script>

<form class="cBodyContent" onsubmit="enableInputs()" action=<?php echo('"'.'./preview.php?form_id='.$_GET['form_id'].'"'); ?> method="post">
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

<script>
    renderForm(js_obj_data);
</script>