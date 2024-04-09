<?php 

    include('../config/constants.php'); 

    session_start();
    if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
        header('Location:../login.php');

    else if(isset($_SESSION['user']))
        header('Location:../User/UserFood.php');
?>

<!DOCTYPE html>

<html>

    <link rel="stylesheet"  href="../css/header.css">
    <link rel="stylesheet"  href="../css/footer.css">
    <link rel="stylesheet"  href="../css/location.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <head>
        <title>Food Category</title>
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
                    <h2>Food Category</h2>
                </div>

                <div class="banner">
                <a href="./addFood.php" class="btn-addlocation">Add New Food</a>
                </div>

                <table class="tbl">
                    <tr>
                        <th>Food Category</th>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Quantity</th>
                    </tr>

                    <?php
                        $sql="SELECT * FROM food";

                        $res=mysqli_query($conn,$sql);
                        
                        $count=mysqli_num_rows($res);

                        if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                                $foodcategory=$row['FOOD_CATEGORY'];
                                $name=$row['FOOD_NAME'];
                                $quantity=$row['FOOD_QUANTITY'];
                                $image=$row['FOOD_PICTURE'];
                                $id=$row['FOOD_ID'];
                                ?>

                                <tr>
                                <th><?php echo  $foodcategory; ?></th>
                                <th>
                                <?php 
                                    if($image!=""){
                                        ?>
                                            <img src="../image/food/<?php echo $image; ?>" width="150px" height="100px">   
                                        <?php
                                    }
                                ?>
                                </th>
                                <th><?php echo  $name; ?></th>
                                <th><?php echo  $quantity; ?></th>
                                <th>
                                    <a href="./UpdateFood.php?FOOD_ID=<?php echo $id; ?>&FOOD_PICTURE=<?php echo $image;?>" class="btn-table-update">Update</a>
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
                        window.location = './DeleteFood.php?FOOD_ID=<?php echo $id; ?>&FOOD_PICTURE=<?php echo $image;?>';
                    }

                })
            });
          
        </script>

    </body>

</html>
