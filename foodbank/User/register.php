<?php include('../config/constants.php'); ?>
<?php
    ob_start();
    session_start();
?>

<!DOCTYPE html>

<html>

    <link rel="stylesheet"  href="../css/header.css">
    <link rel="stylesheet"  href="../css/footer.css">
    <link rel="stylesheet"  href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <head>
        <title>SignUp</title>
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
                        <a href="index.html"><img class="logo" src="../image/logo.png"></a>
                        <li class="headernav"><a href="#">Home</a></li>
                        <li class="headernav"><a href="#">Food Catalog</a></li>
                        <li class="headernav"><a href="#">Food Bank Location</a></li>
                        <li class="headernav"><a href="#">Profile</a></li>
                    </ul>
                </nav><!--header navigation list-->
            </div><!--header-->

            <div class="login">
                <h1 class="text-center">Sign Up</h1>
                    <form action="" method="POST" class="text-center">
                            <input type="text" placeholder="Username" name="username" required><br><br>

                            <input type="text" placeholder="Email Address" name="email" required><br><br>

                            <input type="password" placeholder="Password" name="password" required><br><br>

                            <input type="password" placeholder="Confirm password" name="cpassword" required><br><br>

                            <input type="text" placeholder="First Name" maxlength="20" name="fname" required><br><br>

                            <input type="text" placeholder="Last Name" maxlength="20" name="lname" required><br><br>

                            <input type="text" placeholder="Phone number" maxlength="11" name="phoneno" required><br><br>
 
                            <input type="text" placeholder="Address Line 1" maxlength="40" name="addressline1" required><br><br>

                            <input type="text" placeholder="Address Line 2" maxlength="40" name="addressline2" required><br><br>

                            <input type="text" placeholder="Postcode" maxlength="5" name="postcode" required><br><br>

                            <input type="text" placeholder="City" maxlength="15" name="city" required><br><br>

                            <input type="text" placeholder="State" maxlength="15" name="state" required><br><br>

                            <input type="submit" name="submit" value="Sign up"><br><br>

                    </form>   
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

<?php
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $phone=$_POST['phoneno'];
        $address1=$_POST['addressline1'];
        $address2=$_POST['addressline2'];
        $postcode=$_POST['postcode'];
        $city=$_POST['city'];
        $state=$_POST['state'];

        $sql = "INSERT INTO enduser SET 
                USER_USERNAME='$username',
                USER_FNAME='$fname',
                USER_LNAME='$lname',
                USER_PASSWORD='$password',
                USER_EMAIL='$email',
                USER_PHONENO='$phone',
                USER_ADDRESSLINE1='$address1',
                USER_ADDRESSLINE2='$address2',
                USER_POSTCODE='$postcode',
                USER_CITY='$city',
                USER_STATE='$state'";

        $res = mysqli_query($conn, $sql);

        if($res==true){
            header('location: ../Login/Login.php');
        }

    }
?>