<?php

include('../config/constants.php');
// header('Content-type: application/json');

session_start();

if(isset($_POST['id'],$_POST['password'])){

    $sql = "SELECT * FROM enduser WHERE USER_USERNAME='".$_POST['id']."'";

    $mysqli = new mysqli(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

    if ($mysqli -> connect_errno) {
        http_response_code(400);
        die(json_encode(array("error"=>$mysqli -> connect_error)));
    }

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if(password_verify($_POST['password'], $user['USER_PASSWORD'])){

        if(intval($user['IS_ADMIN']))
            $_SESSION['admin'] = $user['USER_USERNAME'];
         
        else
            $_SESSION['user'] = $user['USER_USERNAME'];
        
        exit(json_encode(array('success'=>true)));
    }

    http_response_code(400);

    die(json_encode(array("error"=>"wrong password or username")));



    // echo json_encode(array('user'=>$user));

    // $res = mysqli_query($conn,$sql);

    // $count = mysqli_num_rows($res);

    // if($count==1){
    //     $_SESSION['user'] = $username;
    //     /*$_SESSION['login'] = "<div class='text-center'> Login Successful. </div>";*/
    //     header('location: ../Login/Profile.php');
    // }
    // else{
    //     $_SESSION['login'] = "<div class='text-center'> Wrong Username or Password </div>";
    //     header('location: ../Login/Login.php');
    // }

    $mysqli->close();
}
else{
    http_response_code(400);
    die(json_encode(array('error'=>'Parameter(s) unset')));
}

