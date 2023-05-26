<?php require '../navbar.php'; ?>
<div class="mainpage">
    <div class="content">
        <div class="cHeaderTitle">
            <h1>Create Tasks</h1>
            <?php

            $array = $_POST;
            unset($array['input_type']);

            $i = 0; 
            foreach($array as $key => $value){
                $x = strval($i)."-".$key;
                $array[$x] = $array[$key];
                unset($array[$key]);
                $i++;
            }

            echo "<pre>" . print_r($array, true) . "</pre>";

            ?>
            <script>
                var js_obj_data = <?php echo json_encode($array)?>;
                console.log(js_obj_data);
            </script>
            <span>Add tasks to the database</span>
        </div>
        <div class="cHeaderImg">
            <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="">
        </div>
        <div id="body" class="cBody">

        </div>
    </div>
</div>

<script>
    renderObject(js_obj_data);
</script>
<?php require '../footer.php'; ?>