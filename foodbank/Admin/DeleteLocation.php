<?php

    include('../config/constants.php'); 
    if(isset($_GET['LOCATION_ID']) AND isset($_GET['LOCATION_PICTURE'])){
        $id=$_GET['LOCATION_ID'];
        $image=$_GET['LOCATION_PICTURE'];

        if($image != ""){
            $path="../image/location/".$image;
            $remove=unlink($path);

            if($remove==false){
                header("location:./FoodLocation.php");
                die();
            }
        }

        $sql="DELETE FROM location WHERE LOCATION_ID='$id'";

        $res=mysqli_query($conn,$sql);

        if($res==true){
            header("location:./FoodLocation.php");
        }

    }
    else{
        header("location: ./FoodLocation.php");
    }
?>