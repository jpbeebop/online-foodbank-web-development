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
        <title>Update Location</title>
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
                        <a href="index.html"><img class="logo" src="../image/logo.png"></a>
                        <li class="headernav"><a href="../index.php">Home</a></li>
                        <li class="headernav"><a href="../Admin/FoodCatalog.php">Food Catalog</a></li>
                        <li class="headernav"><a href="../Admin/FoodLocation.php">Food Bank Location</a></li>
                        <li class="headernav"><a href="../Login/Logout.php">Log Out</a></li>
                    </ul>
                </nav><!--header navigation list-->
            </div><!--header-->
            
                
            <div class="wrapper">
                <h1 class="text-center">Update Location</h1>

                <div class="form-container">
                    <div class="form-inner">
                            <form class="text-center">

                            <div class="field">
                                    <label for="propertyname">Name Of Property</label><br>
                                    <input type="text" placeholder="Property Name" id="propertyname" name="propertyname" required>
                                </div>
                                <br>

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

                                
                                <div class="field">
                                    <label for="picname">Person In Charge</label><br>
                                    <input type="text" placeholder="Person In Charge" id="picname" name="picname" required>
                                </div>
                                <br>

                                <div class="field">
                                    <label for="contactno">Contact No.</label><br>
                                    <input type="text" placeholder="Contact No" id="contactno" name="contactno" required>
                                </div>
                                <br>

                                <div class="field imageContainer" style="display:none;">
                                 
                                </div>
                                <br><br>
                                
                                <div class="field">
                                    <label for="picname">Property Image</label><br>
                                    <input type="file" name="image" id="inpFile">
                                </div>
                                <br>


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
            url:'../src/getLocation.php',
            data:{id:'<?php echo $_GET['LOCATION_ID']?>'},
            type:'GET',
            dataType:'json'
    }).then((response)=>{
        console.log(response);

        $('#propertyname').val(response.LOCATION_NO);
        $('#addressline1').val(response.LOCATION_ADDRESSLINE1);
        $('#addressline2').val(response.LOCATION_ADDRESSLINE2);
        $('#contactno').val(response.LOCATION_PIC_PHONENO);
        $('#city').val(response.LOCATION_CITY);
        $('#state').val(response.LOCATION_STATE);
        $('#postcode').val(response.LOCATION_POSTCODE);
        $('#picname').val(response.LOCATION_PIC_NAME);

        if(response.LOCATION_PICTURE !== ''){

            console.log(response.LOCATION_PICTURE)

            $('.imageContainer').append(`<img src="../image/location/${response.LOCATION_PICTURE}" width="150px" height="100px">`);

            $('.imageContainer').show();
        }

        else{
            $('.imageContainer').append(`<h5>NO IMAGE</h5>`);

            $('.imageContainer').show();
        }
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

            update['id'] = '<?php echo $_GET['LOCATION_ID']?>';

            const aForm = new FormData();

            let file = $('#inpFile').prop('files')[0];

            aForm.append('image',file);

            aForm.append("update", JSON.stringify(update));
            
            $.ajax({
                url:'../src/updateLocation.php',
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

