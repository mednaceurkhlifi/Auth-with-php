<?php
session_start();

if(!isset($_SESSION['email']))
{
    header('location:../index.php');
}


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>


    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/templatemo-style.css" rel="stylesheet">
</head>

<body>





    
    
    <section class="templatemo-top-section">
        <div class="templatemo-header">
             <img class="templatemo-header-img" src="../img/header.png" alt="Header">
            <h1 class="templatemo-site-name">AutoMedic</h1>
            <div class="mobile-menu-icon">
                <i class="fa fa-bars"></i>
            </div>
            <div class="templatemo-nav-container">
                <nav class="templatemo-nav">
                    <ul>
                    <li><a href="http://localhost/User/index.php" class="active">Home</a></li>
                        <li><a href="products.html">Cars</a></li>
                        <li><a href="http://localhost/modification/view/addmodification.php">Custom</a></li>
                        <li><a href="http://localhost/automedic1/projetWeb/add_post.php">Forum</a></li>
                        <li><a href="http://localhost/reclamation/View/addReclamation.php">support</a></li>
                       
                    </ul>
                </nav>
            </div>
        </div>

    </section>


    <h2 align="center">Your Profile</h2>
   
    <h3 align="center">Hello <?php echo $_SESSION['firstName']; echo ' ';  echo $_SESSION['lastName'];?> </h3>
    <h3 align="center">You are connected to your Automedic Profile</h3>



    

    <form class="form-horizontal" method="POST" action="compte.php">
        <div class="form-group">
                <label class="control-label col-sm-2 col-xs-2" for="password">Edit Information</label>
            <div class="col-sm-10">
                <input type="submit" name="update" value="Update" class="btn btn-default">
                <input type="hidden" value=<?PHP echo $_SESSION['idUser']; ?> name="idUser">

            </div>
        </div>

    </form>

    <a align="center" onclick="window.print();" >
        telecharger les données en PDF
    </a>
    <br>
    <a align="center" href="logout.php">Logout</a>

    <br>


    <footer class="tm-footer">
        <div class="container">
            <div class="row margin-bottom-60">
                <nav class="col-lg-3 col-md-3 tm-footer-nav tm-footer-div">
                    <h3 class="tm-footer-div-title">Main Menu</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="gallery.html">Directory</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="services.html">Our Services</a></li>
                    </ul>
                </nav>
                <div class="col-lg-5 col-md-5 tm-footer-div">
                    <h3 class="tm-footer-div-title">About Us</h3>
                    <p class="margin-top-15">Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>
                    <p class="margin-top-15">Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.</p>
                </div>
                <div class="col-lg-4 col-md-4 tm-footer-div">
                    <h3 class="tm-footer-div-title">Get Social</h3>
                    <p>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante.</p>
                    <div class="tm-social-icons-container">
                        <a href="#" class="tm-social-icon"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="tm-social-icon"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="tm-social-icon"><i class="fa fa-linkedin"></i></a>
                        <a href="#" class="tm-social-icon"><i class="fa fa-youtube"></i></a>
                        <a href="#" class="tm-social-icon"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
            <div class="row tm-copyright">
                <p class="col-lg-12 small copyright-text text-center">Copyright &copy; 2084 Company Name</p>
            </div>
        </div>
    </footer>
    <!-- Footer content-->

    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <!-- jQuery -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>
    <!-- Templatemo Script -->
    <script defer src="js/jquery.flexslider-min.js"></script>
    <!-- FlexSlider -->
    <script>
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                slideshow: false,
                prevText: "&#xf104;",
                nextText: "&#xf105;"
            });

            // Remove preloader
            // https://ihatetomatoes.net/create-custom-preloading-screen/
            $('body').addClass('loaded');
        });
    </script>
    <!--<p>Translate this page in your preferred language:</p>-->
<div id="google_translate_element"></div> 
    <script type="text/javascript"> 
    function googleTranslateElementInit() { 
      new google.translate.TranslateElement({pageLanguage: 'en'},'google_translate_element'); 
    } 
    </script> 
    <script type="text/javascript"src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
   <!--   <p>Vous pouvez traduire le contenu de cette page en sélectionnant une langue dans le menu déroulant.</p>-->
</body>
</html>

