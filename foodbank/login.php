<?php 
    include('./config/constants.php');
    session_start();
?>
<!DOCTYPE html>

<html>

    <link rel="stylesheet"  href="./css/header.css">
    <link rel="stylesheet"  href="./css/footer.css">
    <link rel="stylesheet"  href="./css/login.css">
    <!-- <link rel="stylesheet"  href="./html/login.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <head>
        <title>Login</title>
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
                        <li class="headernav"><a href="./Login/Login.php">Profile</a></li> -->
                    </ul>
                </nav><!--header navigation list-->
            </div><!--header-->

            <!-- <div class="login">
                <h1 class="text-center">Login</h1>
                    <?php
                        if(isset($_SESSION['login'])){
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }
                    ?>
                    <br>
               <form action="" method="POST" class="text-center">
                    Username: <br>
                    <input type="text" name="username" placeholder="Enter Username" required><br><br>
                    Password:<br>
                    <input type="password" name="password" placeholder="Enter Password" required><br><br>

                    <a href="../Login/register.php" class="btn-register">Don't have any account?Sign up now!</a><br><br>

                    <input type="submit" name="submit" value="Login" class="btn-primary">
                </form>
            </div> -->

            <div class="wrapper">
                <div class="title-text">
                   <div class="title login">Login</div>
                </div>

                <div class="form-container">
                   <div class="form-inner">
                      <form class="login">
                         <div class="field">
                            <input type="text" 
                                   placeholder="Email Address / ID"
                                   id="id" 
                                   required>
                         </div>

                         <div class="field">
                            <input type="password" 
                                    placeholder="Password"
                                    id="password" 
                                    required>
                         </div>

                         <div class="pass-link">
                            <a href="#">Forgot password?</a>
                         </div>

                         <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" id="login">
                            
                            <!-- <button type="button" id="login">LOGIN</button> -->
                         </div>

                         <div class="signup-link">
                            Don't have an account? <a href="./register.php">Sign up now</a>
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

                $('#login').click(()=>{

                    $.ajax({
                        url:'./src/login.php',
                        data:{  
                                id:$('#id').val(),
                                password:$('#password').val()
                        },
                        type:'POST',
                        dataType:'json'
                    }).then((response)=>{

                        window.location='./index.php';

                    }).catch((response)=>{
                        if(response.responseJSON)
                            alert(response.responseJSON.error);
                        
                    });
                })

            })

        </script>

    </body>

</html>


