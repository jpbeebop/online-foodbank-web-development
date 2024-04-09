<?php
include('../config/constants.php');
session_start();

if(isset($_SESSION['user']))
    $username=$_SESSION['user'];

if(isset($_SESSION['admin']))
    $username=$_SESSION['admin'];

$sql = "SELECT * FROM enduser WHERE USER_USERNAME='$username'";

$mysqli = new mysqli(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

if ($mysqli -> connect_errno) {
    http_response_code(400);
    die(json_encode(array("error"=>$mysqli -> connect_error)));
}

$result = $mysqli->query($sql);

$user = $result->fetch_assoc();

echo json_encode($user);
        