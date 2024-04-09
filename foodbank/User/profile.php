<?php  
session_start();
if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
    header('Location:../login.php');
?>

<!DOCTYPE html>

<!--need to change class name-->

<html>

    <link rel="stylesheet"  href="../css/header.css">
    <link rel="stylesheet"  href="../css/footer.css">
    <link rel="stylesheet"  href="../css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <head>
        <title>Profile</title>
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
                        <a href="../index.php"><img class="logo" src="../image/logo.png"></a>
                        <li class="headernav"><a href="../index.php">Home</a></li>
                        <li class="headernav"><a href="../Admin/FoodCatalog.php">Food Catalog</a></li>
                        <li class="headernav"><a href="../Admin/FoodLocation.php">Food Bank Location</a></li>
                        <li class="headernav"><a href="../Login/Logout.php">Log Out</a></li>
                    </ul>
                </nav><!--header navigation list-->
            </div><!--header-->

            <div class="wrapper">
                <h1 class="text-center">Profile</h1>

                <div class="form-container">
                    <div class="form-inner">
                            <form class="text-center">

                                <div class="field">
                                    <label for="email">Email</label><br>
                                    <input type="text" placeholder="Email Address" id="email" name="email" required>
                                </div>
                                <br>

                                <div class="field">
                                    <label for="fname">First Name</label><br>
                                    <input type="text" placeholder="First Name" maxlength="20" id="fname" name="fname" required>
                                </div>
                                <br/>

                                <div class="field">
                                    <label for="phone">Last Name</label><br>
                                    <input type="text" placeholder="Last Name" maxlength="20" id="lname" name="lname" required>
                                </div>
                                <br/>

                                <div class="field">
                                    <label for="phone">Phone Number</label><br>
                                    <input type="text" placeholder="Phone number" maxlength="11" id="phoneno" name="phoneno" required>
                                </div>
                                <br/>

                                <div class="field">
                                    <label for="phone">Address Line 1</label><br>
                                    <input type="text" placeholder="Address Line 1" maxlength="40" id="addressline1" name="addressline1" required>
                                </div>
                                <br/>

                                <div class="field">
                                    <label for="phone">Address Line 2</label><br>
                                    <input type="text" placeholder="Address Line 2" maxlength="40" id="addressline2" name="addressline2" required>
                                </div>
                                <br/>

                                <div class="field">
                                    <label for="phone">Postcode</label><br>
                                    <input type="text" placeholder="Postcode" maxlength="5" id="postcode" name="postcode" required>
                                </div>
                                <br/>

                                <div class="field">
                                    <label for="phone">City</label><br>
                                    <input type="text" placeholder="City" maxlength="15" id="city" name="city" required>
                                </div>
                                <br/>

                                <div class="field">
                                    <label for="phone">State</label><br>
                                    <input type="text" placeholder="State" maxlength="15" id="state" name="state" required>
                                </div>
                                <br/>

                                <div class="field btn">
                                    <div class="btn-layer"></div>
                                    <input type="submit" id="update">
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

                $.ajax({
                        url:'../src/getProfile.php',
                        type:'GET',
                        dataType:'json'
                }).then((response)=>{
                    console.log(response);

                    $('#email').val(response.USER_EMAIL);
                    $('#fname').val(response.USER_FNAME);
                    $('#lname').val(response.USER_LNAME);
                    $('#phoneno').val(response.USER_PHONENO);
                    $('#addressline1').val(response.USER_ADDRESSLINE1);
                    $('#addressline2').val(response.USER_ADDRESSLINE2);
                    $('#city').val(response.USER_CITY);
                    $('#state').val(response.USER_STATE);
                    $('#postcode').val(response.USER_POSTCODE);
                    
                }).catch((response)=>{
                    console.log(response);
                    if(response.responseJSON){
                        alert(response.responseJSON.error)
                    }
                });

                $('#update').click(()=>{

                    let confirm = window.confirm("Confirm update");

                    if(confirm){
                        let update = {};

                        $('form').serializeArray().map((item)=>{
                            update[item.name] = item.value;
                        });

                        $.ajax({
                            url:'../src/updateProfile.php',
                            data:{  
                                update:update
                            },
                            type:'POST',
                            dataType:'json'
                        }).then((response)=>{
                            alert('All done!');
                            // window.location='./login.php';
                            
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



