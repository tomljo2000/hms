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
    $tableData = add($tableData, "task_form_inputs", "task_form_id");
    $tableData = add($tableData, "inputs", "input_title");
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
?>