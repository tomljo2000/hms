<?php require '../navbar.php'; ?>
<div class="mainpage">
    <div class="content">
        <div class="cHeaderTitle">
            <h1>Create Tasks</h1>
            <?php

            $array = $_POST;
            unset($array['input_type']);

            var_dump($array);

            $serlizedArray = serialize($array);

            echo "<br>";

            var_dump($serlizedArray);

            $i = 0;
            foreach ($array as $key => $value) {
                $x = strval($i) . "-" . $key;
                $array[$x] = $array[$key];
                unset($array[$key]);
                $i++;
            }

            echo "<pre>" . print_r($array, true) . "</pre>";

            ?>
            <script>
                var js_obj_data = <?php echo json_encode($array) ?>;
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

    <form class="cBodyContent" onsubmit="return confirm('Are you sure')" action="./preview.php" method="post">
    <span>Preview</span>
    <div id="render" style="border: black; border-style: dashed;">
        <script>
            renderObject(js_obj_data);
        </script>
    </div>
       
        <div id="formRender">
        </div>
        <div style="border:none; justify-content:center">
            <div class="double">
                <input type="submit" value="Save Task">
            </div>
        </div>
    </form>
    <button onclick="window.location.href = './taskForm.php';">Back</button>

</div>



<?php require '../footer.php'; ?>