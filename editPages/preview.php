<?php require '../navbar.php'; ?>
<div class="mainpage">
    <div class="content">
        <div class="cHeaderTitle">
            <h1>Create Tasks</h1>
            <?php 
            echo "<pre>" . print_r($_POST, true) . "</pre>"; 
            ?>
            <script>
                var js_data = '<?php echo json_encode($_POST); ?>';
                js_data = js_data.replace(/\n/g, '\\n');
                js_data = js_data.replace(/\r/g, '\\r');
                console.log(js_data);
                var js_obj_data = JSON.parse(js_data);
            </script>
            <span>Add tasks to the database</span>
        </div>
        <div class="cHeaderImg">
            <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="">
        </div>
        <div class="cBody">

        </div>
    </div>
</div>
<?php require '../footer.php'; ?>