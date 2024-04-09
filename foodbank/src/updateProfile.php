<?php
include('../config/constants.php');
session_start();

if(isset($_SESSION['user']))
    $username=$_SESSION['user'];

if(isset($_SESSION['admin']))
    $username=$_SESSION['admin'];

if(isset($_POST['update'])){

    $update = $_POST['update'];

    foreach($update as $value){
        if(!$value){
            http_response_code(400);
            die(json_encode(array("error"=>"Please fill in all fields!")));
        }
            
    }

    $sql = "UPDATE enduser SET 
            USER_FNAME='".$update['fname']."',
            USER_LNAME='".$update['lname']."',
            USER_EMAIL='".$update['email']."',
            USER_PHONENO='".$update['phoneno']."',
            USER_ADDRESSLINE1='".$update['addressline1']."',
            USER_ADDRESSLINE2='".$update['addressline2']."',
            USER_POSTCODE='".$update['postcode']."',
            USER_CITY='".$update['city']."',
            USER_STATE='".$update['state']."'
            WHERE USER_USERNAME = '".$username."'";

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