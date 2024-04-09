<?php 

    include('../config/constants.php'); 

    session_start();
    
    if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
        header('Location:../login.php');

    if(isset($_SESSION['user']))
        header('Location:../index.php');

?>

<!DOCTYPE html>

<html>

    <link rel="stylesheet"  href="../css/header.css">
    <link rel="stylesheet"  href="../css/footer.css">
    <link rel="stylesheet"  href="../css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <head>
        <title>Add Food</title>
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
                <h1 class="text-center">Add Food</h1>

                <div class="form-container">
                    <div class="form-inner">
                            <form class="text-center">
                                <div class="field">
                                    <label for="phone">Food Category</label><br>
                                    <input type="text" name="foodcategory" placeholder="Food Category">
                                </div>
                                <br/>

                                <div class="field">
                                    <label for="phone">Name</label><br>
                                    <input type="text" name="name" placeholder="Name">
                                </div>
                                <br/>

                                <div class="field">
                                    <label for="phone">Quantity</label><br>
                                    <input type="text" name="quantity" placeholder="Quantity">
                                </div>
                                <br/>

                                <div class="field">
                                    <label for="picname">Food Image</label><br>
                                    <input type="file" name="image" id="inpFile">
                                </div>
                                <br>

                                <div class="field btn">
                                    <div class="btn-layer"></div>
                                    <input type="submit" id="add">
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

                $('#add').click(()=>{

                    let confirm = window.confirm("Confirm add");

                    if(confirm){
                        let add = {};

                        $('form').serializeArray().map((item)=>{
                            add[item.name] = item.value;
                        });

                        const aForm = new FormData();

                        let file = $('#inpFile').prop('files')[0];

                        aForm.append('image',file);

                        aForm.append("add", JSON.stringify(add));
                        
                        $.ajax({
                            url:'../src/addFood.php',
                            data:aForm,
                            type:'POST',
                            processData: false,
                            contentType: false
                        }).then((response)=>{
                            console.log(response);
                            alert('All done!')
                            
                        }).catch((response)=>{
                            console.log(response);
                            if(response.responseText){
                                alert(JSON.parse(response.responseText).error)
                            }
                        });
                    }
                })

            })

        </script>

        

    </body>

</html>

