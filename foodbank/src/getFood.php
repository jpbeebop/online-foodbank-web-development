<?php
include('../config/constants.php');


if(isset($_GET['id'])){

    $sql="SELECT * FROM food WHERE FOOD_ID='".$_GET['id']."'";

    $mysqli = new mysqli(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

    if ($mysqli -> connect_errno) {
        http_response_code(400);
        die(json_encode(array("error"=>$mysqli -> connect_error)));
    }
    
    $result = $mysqli->query($sql);
    
    $location = $result->fetch_assoc();

    echo json_encode($location);

}




        