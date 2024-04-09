<?php
include('../config/constants.php');

if(isset($_POST['update'])){

    $update = json_decode($_POST['update'],true);

    foreach($update as $value){
        if(!$value){
            http_response_code(400);
            die(json_encode(array("error"=>"Please fill in all fields!")));
        }
            
    }

    if(isset($_FILES['image'])){
    // if(isset($_FILES['image']['name'])){
        $imagename=$_FILES['image']['name'];
        $source_path=$_FILES['image']['tmp_name'];
        $destination_path="../image/location/".$imagename;
        $upload=move_uploaded_file($source_path,$destination_path);

        if($upload==false){
                http_response_code(400);

                die(json_encode(array("error"=>'could not upload image')));
        }

        $sql = "UPDATE location SET 
                LOCATION_NO='".$update['propertyname']."',
                LOCATION_ADDRESSLINE1='".$update['addressline1']."',
                LOCATION_ADDRESSLINE2='".$update['addressline2']."',
                LOCATION_POSTCODE='".$update['postcode']."',
                LOCATION_CITY='".$update['city']."',
                LOCATION_STATE='".$update['state']."',
                LOCATION_PIC_NAME='".$update['picname']."',
                LOCATION_PIC_PHONENO='".$update['contactno']."',
                LOCATION_PICTURE='$imagename'
                WHERE LOCATION_ID='".$update['id']."'";
    }
    else{
        $sql = "UPDATE location SET 
                LOCATION_NO='".$update['propertyname']."',
                LOCATION_ADDRESSLINE1='".$update['addressline1']."',
                LOCATION_ADDRESSLINE2='".$update['addressline2']."',
                LOCATION_POSTCODE='".$update['postcode']."',
                LOCATION_CITY='".$update['city']."',
                LOCATION_STATE='".$update['state']."',
                LOCATION_PIC_NAME='".$update['picname']."',
                LOCATION_PIC_PHONENO='".$update['contactno']."'
                WHERE LOCATION_ID='".$update['id']."'";
    }
    

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

?>