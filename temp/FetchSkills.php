<?php

    require_once 'dbconnect.php';
    $errors = array();
    $query = "SELECT skill_id,skill_name from skill;";
    $runQuery = mysqli_query($dbcon, $query);
    $skills = array();
if ( $runQuery->num_rows>0 ){
    while($row = $runQuery->fetch_assoc()){
        $data['id'] = $row['skill_id'];
        $data['value'] = $row['skill_name'];
        array_push($skills,$data);
    }
}

echo json_encode($skills);

?>
