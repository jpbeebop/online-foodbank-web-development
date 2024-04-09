<?php include('./config/constants.php'); ?>
<?php
    ob_start();
    session_start();
?>

<!DOCTYPE html>

<html>

    <link rel="stylesheet"  href="./css/header.css">
    <link rel="stylesheet"  href="./css/footer.css">
    <link rel="stylesheet"  href="./css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <head>
        <title>SignUp</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                        <a href="./index.php"><img class="logo" src="./image/logo.png"></a>
                        <li class="headernav"><a href="./index.php">Home</a></li>
                        <!--<li class="headernav"><a href="#">Food Catalog</a></li>
                        <li class="headernav"><a href="#">Food Bank Location</a></li>
                        <li class="headernav"><a href="#">Profile</a></li> -->
                    </ul>
                </nav><!--header navigation list-->
            </div><!--header-->

            <div class="wrapper">
                <h1 class="text-center">Sign Up</h1>
                
                <div class="form-container">
                   <div class="form-inner">
                        <form class="text-center">

                            <div class="field">
                                <input type="text" placeholder="Username" name="username" required>
                            </div>

                            <div class="field">
                                <input type="text" placeholder="Email Address" name="email" required>
                            </div>

                            <div class="field">
                                <input type="password" placeholder="Password" name="password" required>
                            </div>

                            <div class="field">
                                <input type="password" placeholder="Confirm password" name="cpassword" required>
                            </div>

                            <div class="field">
                                <input type="text" placeholder="First Name" maxlength="20" name="fname" required>
                            </div>

                           <div class="field">
                                <input type="text" placeholder="Last Name" maxlength="20" name="lname" required>
                           </div>

                            <div class="field">
                                <input type="text" placeholder="Phone number" maxlength="11" name="phoneno" required>
                            </div>

                           <div class="field">
                                <input type="text" placeholder="Address Line 1" maxlength="40" name="addressline1" required>
                           </div>

                            <div class="field">
                            <input type="text" placeholder="Address Line 2" maxlength="40" name="addressline2" required>
                            </div>

                            <div class="field">
                            <input type="text" placeholder="Postcode" maxlength="5" name="postcode" required>
                            </div>

                            <div class="field">
                                <input type="text" placeholder="City" maxlength="15" name="city" required>
                            </div>

                            <div class="field">
                            <input type="text" placeholder="State" maxlength="15" name="state" required>
                            </div>

                            <div class="field btn">
                                <div class="btn-layer"></div>
                                <input type="submit" id="register">
                            </div>

                        </form>   

                   </div>
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
        
        <script>

            $(function(){

                $('form').submit((event)=>{event.preventDefault();});

                $('#register').click(()=>{

                    let confirm = window.confirm("Confirm register");

                    if(confirm){
                        let register = {};

                        $('form').serializeArray().map((item)=>{
                            register[item.name] = item.value;
                        });

                        $.ajax({
                            url:'./src/register.php',
                            data:{  
                                register:register
                            },
                            type:'POST',
                            dataType:'json'
                        }).then((response)=>{
                            alert('All done!')
                            window.location='./login.php';
                            
                        }).catch((response)=>{
                            console.log(response);
                            if(response.responseJSON){
                                alert(response.responseJSON.error)
                            }
                        });
                    }
                })

            })

        </script>


    </body>

</html>

