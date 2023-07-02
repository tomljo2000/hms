<?php
//OBJECT = array of from rows_array, TABLE = table you want to include in array, LINNK is the shared column between the two tables
function add($object, $table,  $link)
{
    $db = new SQLite3('../hospital2.db');
    foreach ($object as $rowKey => $row_entry) {
        foreach ($row_entry as $key => $value)
            if ($key == $link) {
                $stmt = $db->prepare('SELECT * FROM ' . $table . ' WHERE ' . $link . ' = :value');
                $stmt->bindParam(':value', $value, SQLITE3_TEXT);
                $result = $stmt->execute();
                //$rows_array = [];
                //echo '<pre>';
                while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                    //$rows_array[] = $row;
                    foreach ($row as $key => $value) {
                        if ($key != $link) {
                            $object[$rowKey] = $row + $object[$rowKey];
                        }
                    }
                    //print_r($row);
                    //echo ('#');
                }
                //echo '</pre>';
            }
    }
    $db->close();
    return $object;
}

//return all from table as array
function getTable($tableName, $columName, $value){
    $db = new SQLite3('../hospital2.db');
    if(isset($columName) && isset($value)){
    $stmt = $db->prepare('SELECT * FROM '.$tableName.' WHERE '.$columName.' = :value');
    $stmt->bindParam(':value', $value, SQLITE3_TEXT);    
    }
    else{
    $stmt = $db->prepare('SELECT * FROM '.$tableName);
    }
    $result = $stmt->execute();
    $rows_array = [];

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $rows_array[] = $row;
    }
    $db->close();
    return $rows_array;
}

function getAllFormData($id){
    $tableData = getTable('task_form', 'task_form_id', $id);
    return $tableData;
}

function getAllPatientsData(){
    $tableData = getTable('patient', null, null);
    $tableData = add($tableData, "user_details", "user_id");
    $tableData = add($tableData, "allergies", "nhs_no");
    return $tableData;
}

function getAllStaffData(){
    $tableData = getTable('staff', null, null);
    $tableData = add($tableData, "user_details", "user_id");
    $tableData = add($tableData, "admin", "user_id");
    $tableData = add($tableData, "manager", "user_id");
    $tableData = add($tableData, "clinician", "user_id");
    // echo '<pre>' , var_dump($tableData),'</pre>';
    return $tableData;
}

function getPatientData($x){
    $x = getTable("patient", "nhs_no", $x);
    $x = add($x, "user_details", "user_id");
    $x = add($x, "allergies", "nhs_no");
    //echo '<pre>' , var_dump($x),'</pre>';
    return $x;
}

function deleteRow($table, $column, $value){
    $db = new SQLite3('../hospital2.db');
    $stmt = $db->prepare('DELETE FROM '.$table.' WHERE '.$column.' = :value');
    $stmt->bindParam(':value', $value, SQLITE3_TEXT);
    $stmt->execute();
    $db->close();
    return; 
}   

function insertDataIntoTable($table, $idColum, $idData, $column, $data){
    $db = new SQLite3('../hospital2.db');
    $stmt = $db->prepare('UPDATE "'.$table.'" SET "'.$column.'"= :data'. ' WHERE "'.$idColum.'"="'.$idData.'"');
    $stmt->bindParam(':data', $data, SQLITE3_TEXT);
    $stmt->execute(); 
    $db->close(); 
    return; 
}

function pwdRest(){
    $return = "";
    if(isset($_POST["id"])){
        $db = new SQLite3('../hospital2.db');
        $stmt = $db->prepare('SELECT * FROM user_details WHERE user_id = :value');
        $stmt->bindParam(':value', $_POST["id"], SQLITE3_TEXT);
        $result = $stmt->execute();
        $rows_array = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $rows_array[] = $row;
        }
        $db->close();
        if(count($rows_array) == 1){
            $return = "Email sent";
        }
        else{
            $return = "Id not found";
        }
    }
    if(isset($_POST["email"])){
        $db = new SQLite3('../hospital2.db');
        $stmt = $db->prepare('SELECT * FROM user_details WHERE email = :value');
        $stmt->bindParam(':value', $_POST["email"], SQLITE3_TEXT);
        $result = $stmt->execute();
        $rows_array = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $rows_array[] = $row;
        }
        $db->close();
        if(count($rows_array) == 1){
            $return = $return+"Email sent";
        }
        else{
            $return = $return+"Email not found";
        }
    }
    return $return;
    
}
?>