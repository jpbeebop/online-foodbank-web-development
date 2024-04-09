<?php include('../config/constants.php'); ?>
<?php 
    session_start();
?>
<!DOCTYPE html>

<html>

    <link rel="stylesheet"  href="../css/header.css">
    <link rel="stylesheet"  href="../css/footer.css">
    <link rel="stylesheet"  href="../css/location.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <head>
        <title>Login</title>
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
                        <a href="../Login/index.php"><img class="logo" src="../image/logo.png"></a>
                        <li class="headernav"><a href="../Login/index.php">Home</a></li>
                        <li class="headernav"><a href="#">Food Catalog</a></li>
                        <li class="headernav"><a href="#">Food Bank Location</a></li>
                    </ul>
                </nav><!--header navigation list-->
            </div><!--header-->

           <div class="outer">
               <h2>Summary</h2><br>
               <div class="inner">
                <?php
                        $sql = "SELECT * FROM food";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);
                        ?>
                        <br>
                        <h2>Food</h2>
                        <span style="font-weight: bold;">Total Food: <?php echo $count;?></span><br><br>
                        <span style="font-weight: bold; font-size:medium;">Food Available</span><br>
                        <?php
                            if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                                $foodcategory=$row['FOOD_CATEGORY']."<br>";
                                $name=$row['FOOD_NAME']."<br>";
                                $quantity=$row['FOOD_QUANTITY']."<br>"."<br>";
                                ?>
                                
                                <span style="font-weight: bold;">Food Category:&emsp;<?php echo $foodcategory;?></span>
                                <span style="font-weight: bold;">Name:&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<?php echo $name;?></span>
                                <span style="font-weight: bold;">Quantity:&emsp;&emsp;&emsp;&ensp;&nbsp;<?php echo $quantity;?></span>
                            
                                <?php
                            } 
                        }

                    ?> 
                    
                    <?php
                        $sql = "SELECT * FROM location";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);
                        ?>
                        <br>
                        <h2>Location</h2>
                        <span style="font-weight: bold;">Total Food Bank Location: <?php echo $count;?></span><br><br>
                        <span style="font-weight: bold; font-size:medium;">Food Bank Loaction Available</span><br>
                        <?php
                            if($count>0){
                            while($rows=mysqli_fetch_assoc($res)){
                                    $propertyname=$rows['LOCATION_NO'];
                                    $address1=$rows['LOCATION_ADDRESSLINE1'];
                                    $address2=$rows['LOCATION_ADDRESSLINE2'];
                                    $postcode=$rows['LOCATION_POSTCODE'];
                                    $city=$rows['LOCATION_CITY'];
                                    $state=$rows['LOCATION_STATE'];
                                    $picname=$rows['LOCATION_PIC_NAME'];
                                    $picno=$rows['LOCATION_PIC_PHONENO'];
                                ?>
                                
                                <span style="font-weight: bold;">Property Name:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $propertyname;?></span><br>
                                <span style="font-weight: bold;">Address:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $address1." ".$postcode.$city.$state;?></span><br>
                                <span style="font-weight: bold;">Person-in-charge Name:&ensp;&nbsp;&emsp;&emsp;&emsp;<?php echo $picname;?></span><br>
                                <span style="font-weight: bold;">Person-in-charge Contact No.:&emsp;<?php echo $picno;?></span><br><br>
                            
                                <?php
                            } 
                        }

                    ?> 
               </div>         
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
        

    </body>

</html>

