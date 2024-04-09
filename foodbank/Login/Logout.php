<?php
    include('../config/constants.php');
    session_start();
    session_destroy();
    
    header('location: ../login.php');
?>