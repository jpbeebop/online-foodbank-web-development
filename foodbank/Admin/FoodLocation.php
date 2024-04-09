<?php 

    include('../config/constants.php'); 

    session_start();
    if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
        header('Location:../login.php');

    else if(isset($_SESSION['user']))
        header('Location:../User/UserLocation.php');
?>

<!DOCTYPE html>

<html>

    <link rel="stylesheet"  href="../css/header.css">
    <link rel="stylesheet"  href="../css/footer.css">
    <link rel="stylesheet"  href="../css/location.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <head>
        <title>Food Location</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            *{
                box-sizing: border-box;
                color: black;
            }
            body{
                font-family: Arial, Helvetica, sans-serif;
            }
            a:link{
                text-decoration: none;
                cursor: pointer;
                font-weight: bold;
            }
            .grid-container{
                display: grid;
                grid-template-areas:
                'header ' 
                'middle '
                'footer' ;
            }
           .wrapper{
                grid-area: middle;
            }        
        </style>

    </head>

    <body>
        <div class="grid-container">
            <div class="header">
                <nav class="header-header">
                    <ul class="header-list">
                        <a href="../index.php"><img class="logo" src="../image/logo.png"></a>
                        <li class="headernav"><a href="../index.php">Home</a></li>
                        <li class="headernav"><a href="../Admin/FoodCatalog.php">Food Catalog</a></li>
                        <li class="headernav"><a href="../Admin/FoodLocation.php">Food Bank Location</a></li>
                        <li class="headernav"><a href="../Login/Logout.php">Log Out</a></li>
                    </ul>
                </nav><!--header navigation list-->

            </div><!--header-->
        <div>
            <div class="table">                   
                <div class="banner">
                    <h2>Food Location</h2>
                </div>

                <div class="banner">
                <a href="./addLocation.php" class="btn-addlocation">Add New Location</a>
                </div>

                <table class="tbl">
                    <tr>
                        <th>Property Name</th>
                        <th>Picture</th>
                        <th>Address</th>
                        <th>Person-in-Charge Name</th>
                        <th>Contact No</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        $sql="SELECT * FROM location";

                        $res=mysqli_query($conn,$sql);
                        
                        $count=mysqli_num_rows($res);

                        if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                                $id=$row['LOCATION_ID'];
                                $propertyname=$row['LOCATION_NO'];
                                $address1=$row['LOCATION_ADDRESSLINE1'];
                                $address2=$row['LOCATION_ADDRESSLINE2'];
                                $postcode=$row['LOCATION_POSTCODE'];
                                $city=$row['LOCATION_CITY'];
                                $state=$row['LOCATION_STATE'];
                                $pic=$row['LOCATION_PIC_NAME'];
                                $contactno=$row['LOCATION_PIC_PHONENO'];
                                $image=$row['LOCATION_PICTURE'];
                                ?>

                                <tr>
                                <th><?php echo  $propertyname; ?></th>
                                <th>
                                <?php 
                                    if($image!=""){
                                        ?>
                                            <img src="../image/location/<?php echo $image; ?>" width="150px" height="100px">   
                                        <?php
                                    }
                                ?>
                                </th>
                                <th><?php echo  $address1.$address2.",".$postcode.",".$city.",".$state; ?></th>
                                <th><?php echo  $pic; ?></th>
                                <th><?php echo  $contactno; ?></th>
                                <th>
                                    <a href="./UpdateLocation.php?LOCATION_ID=<?php echo $id; ?>&LOCATION_PICTURE=<?php echo $image;?>" class="btn-table-update">Update</a>
                                    <a id="delete" tabindex="0" class="btn-table-delete" style="cursor:pointer">Delete</a>
                                </th>
                    
                                </tr>
                                <?php
                            } 
                        }

                    ?>            
                </table>
            </div>



            <div class="footer">
                <div class="footer-inner-grid">
                    <div id="about-us">
                        <h3>About Us</h3>
                        <p>We dedicated to help Malaysian during the darkest time.</p>
                        <p>Contact us to donate to the food bank.</p>
                        <p>Together, we are stronger.</p>
                    </div>

                    <div id="contact-us">
                        <h3>Contact us</h3>
                        <p>012- 354 6789</p>
                        <p>07 -654 321</p>
                        <p><a href = "mailto: help-cyber@gmail.com" id="email">help-cyber@gmail.com</a></p>
                    </div>

                    <div id="copyright">
                        <h3>Follow Us</h3>
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-instagram"></a>
                        <p>&copy; 2020 by Help@Cyberjaya</p>
                    </div>
                    
                </div>
            </div><!--footer-->

        </div>
        
        <script>
            $(function(){
                $('a#delete').click(()=>{

                    let confirm = window.confirm("Confirm delete");

                    if(confirm){
                        window.location = './DeleteLocation.php?LOCATION_ID=<?php echo $id; ?>&LOCATION_PICTURE=<?php echo $image;?>';
                    }

                })
            });
          
        </script>

    </body>

</html>
