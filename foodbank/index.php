<!DOCTYPE html>

<html>

    <link rel="stylesheet"  href="./css/header.css">
    <link rel="stylesheet"  href="./css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <head>
        <title>Home</title>

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
                'header header header header' 
                'gallery gallery gallery gallery'
                'left left right right' 
                'footer footer footer footer';
            }
            .content-left,
            .content-right{
                height: 350px;
                text-align: center;
            }
            .photo-gallery{
                grid-area: gallery;
                background-color: white;
                grid-template-columns: 1fr 1fr 1fr;
                padding: 0px;
                margin: 0px;
            }
            .content-left{
                grid-area: left;
                background-color: #DBD9D9;
                padding: 10px;
                justify-content:left;
                text-align:justify;
            }
            .content-right{
                grid-area:right;
                background-color: #DBD9D9;  
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
                        <li class="headernav"><a href="./Admin/FoodCatalog.php">Food Catalog</a></li>
                        <li class="headernav"><a href="./Admin/FoodLocation.php">Food Bank Location</a></li>
                        <li class="headernav"><a href="./User/profile.php">Profile</a></li>
                    </ul>
                </nav><!--header navigation list-->
            </div><!--header-->

            <div class="photo-gallery">
                <img src="./image/bag.jpg" alt="foodbank photo by Ismael Paramo on Unsplash" style="width: 496px">
                <img src="./image/truck.jpg" alt="foodbank photo by Joel Muniz on Unsplash" style="width: 496px">
                <img src="./image/help.jpg" alt="foodbank photo by Melissa Lim on Unsplash" style="width: 496px">
            </div>
        
            <div class="content-left">
                <h2>About Us</h2>
                <p>This project is initiated to solve the problem in which there was no food bank application in the market prior to the lockdown period in Malaysia. Due to the pandemic of Covid-19, Malaysia has been imposing nationwide lockdown since the mid-year of 2020. Many people have lost their job and undergone financial crises. Many families struggle to have one meal a day, which brings them to raise white flag outside their house to plea for help. In response, many food banks surge to help to provide food. However, the disorganization of the food banks limits the number of beneficiaries. 
In addition, this is to collect and consolidate the locations of food banks in Cyberjaya into one platform. Since many of the food banks are organized by the kind-hearted individuals who do not belong to any Non-Governmental Organization (NGO), the information on the food bank organized by them, such as the date and location will be hardly reachable unless being verbally informed or spread through social media like Facebook. 
 </p>
            </div>
        
            <div class="content-right">
                <img src="./image/foodbank.jpg" alt="foodbank photo by Joel Muniz on Unsplash" style="width:680px; height:350;">
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
