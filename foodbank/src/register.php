<?php

include('../config/constants.php');

if(isset($_POST['register'])){

    $register = $_POST['register'];

    if($register['password'] !== $register['cpassword']){
        http_response_code(400);
        die(json_encode(array("error"=>"passwords not match")));
    }

    $password = password_hash($register['password'], PASSWORD_DEFAULT);

    foreach($register as $value){
        if(!$value){
            http_response_code(400);
            die(json_encode(array("error"=>"Please fill in all fields!")));
        }
            
    }

    $sql = "INSERT INTO enduser SET 
            USER_USERNAME='".$register['username']."',
            USER_FNAME='".$register['fname']."',
            USER_LNAME='".$register['lname']."',
            USER_PASSWORD='".$password."',
            USER_EMAIL='".$register['email']."',
            USER_PHONENO='".$register['phoneno']."',
            USER_ADDRESSLINE1='".$register['addressline1']."',
            USER_ADDRESSLINE2='".$register['addressline2']."',
            USER_POSTCODE='".$register['postcode']."',
            USER_CITY='".$register['city']."',
            USER_STATE='".$register['state']."'";

        try{

            $mysqli = new mysqli(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

            // Check connection
            if ($mysqli -> connect_errno) {

                http_response_code(400);

                die(json_encode(array("error"=>$mysqli -> connect_error)));

            }

            if($mysqli->query($sql) === TRUE)
                echo json_encode(array('success'=>true));

            else
                echo json_encode(array('failed'=>$mysqli->error));

            $mysqli->close();
        }
        catch(Exception $err){
            http_response_code(400);
            die(json_encode(array("error"=>$err->getMessage())));
        }

}
?>