<?php

include('../config/constants.php');

if(isset($_POST['add'])){

    $add = json_decode($_POST['add'],true);

    foreach($add as $value){
        if(!$value){
            http_response_code(400);
            die(json_encode(array("error"=>"Please fill in all fields!")));
        }
            
    }

    if(isset($_FILES['image'])){
    // if(isset($_FILES['image']['name'])){
        $imagename=$_FILES['image']['name'];
        $source_path=$_FILES['image']['tmp_name'];
        $destination_path="../image/food/".$imagename;
        $upload=move_uploaded_file($source_path,$destination_path);

        if($upload==false){
                http_response_code(400);

                die(json_encode(array("error"=>'could not upload image')));
        }
    }
    else{
        $imagename="";
    }

    // $foodcategory=$_POST['foodcategory'];
    // $name=$_POST['name'];
    // $quantity=$_POST['quantity'];

    $sql = "INSERT INTO food SET 
            FOOD_CATEGORY='".$add['foodcategory']."',
            FOOD_NAME='".$add['name']."',
            FOOD_QUANTITY='".$add['quantity']."',
            FOOD_PICTURE='$imagename'
            ";

    try{

        $mysqli = new mysqli(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

        // Check connection
        if ($mysqli -> connect_errno) {

            http_response_code(400);

            die(json_encode(array("error"=>$mysqli -> connect_error)));

        }

        if($mysqli->query($sql) === TRUE)
            echo json_encode(array('success'=>true));

        else{
            http_response_code(400);
            echo json_encode(array('error'=>$mysqli->error));
        }
            

        $mysqli->close();
    }
    catch(Exception $err){
        http_response_code(400);
        die(json_encode(array("error"=>$err->getMessage())));
    }
}

    