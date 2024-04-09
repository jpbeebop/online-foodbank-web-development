<?php

    include('../config/constants.php'); 
    if(isset($_GET['FOOD_ID']) AND isset($_GET['FOOD_PICTURE'])){
        $id=$_GET['FOOD_ID'];
        $image=$_GET['FOOD_PICTURE'];

        if($image != ""){
            $path="../image/food/".$image;
            $remove=unlink($path);

            if($remove==false){
                header("location:.FoodCatalog.php");
                die();
            }
        }

        $sql="DELETE FROM food WHERE FOOD_ID='$id'";

        $res=mysqli_query($conn,$sql);

        if($res==true){
            header("location:./FoodCatalog.php");
        }

    }
    else{
        header("location: .FoodCatalog.php");
    }
?>