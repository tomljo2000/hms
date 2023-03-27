<?php

function prepDb(){
    return new SQLite3('C:\xampp\htdocs\hms\hospital.db');
}

function exectuteArray($stmt){
    $result = $stmt->execute();
    $rows_array = [];
    while ($row = $result->fetchArray()) {
        $rows_array[] = $row;
    }

    return $rows_array;
}

function verifyUsers()
{
    $db = prepDb(); 
    if (!isset($_POST['id']) or !isset($_POST['pwd'])) {
        return;
    }

    $stmt = $db->prepare('SELECT * From staff WHERE staff_id=:id AND pwd=:pwd');
    $stmt->bindParam(':id', $_POST['id'], SQLITE3_TEXT);
    $stmt->bindParam(':pwd', $_POST['pwd'], SQLITE3_TEXT);
    
    return exectuteArray($stmt);

}

function getUserDetails($user_id){ 
    $db = prepDb(); 
    $stmt = $db->prepare('SELECT * From user_details WHERE user_id=:user_id');
    $stmt->bindParam(':user_id', $user_id, SQLITE3_TEXT);

    return exectuteArray($stmt);
}

function getDep($user_id){ 
    $db = prepDb(); 
    $tables = array("admin", "clinician", "manager");
    
    foreach ($tables as $table) {
        $sql = "SELECT dep_name From $table WHERE user_id=:user_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, SQLITE3_TEXT);
        $result = exectuteArray($stmt);
        if($result != null){
        array_push($result, $table); 
            break;
        }
    }

    return $result; 
}


function checkSession ($path) {

    $expireAfter = 1;

    if(isset($_SESSION['last_action'])){

        $secondsInactive = time() - $_SESSION['last_action'];

        $expireAfterSeconds = $expireAfter * 10;

        if($secondsInactive >= $expireAfterSeconds){

            session_unset();
            session_destroy();
            header("Location:".$path);
        }
    }
    $_SESSION['last_action'] = time(); 
    $url=$_SERVER['REQUEST_URI'];
    $timeOut = ($expireAfter*10)+1; 
    header("Refresh: $timeOut; URL=$url"); 
}
