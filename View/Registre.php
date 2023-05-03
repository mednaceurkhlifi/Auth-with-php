<?php

include '../Controller/UserC.php';

session_start();


if(isset($_SESSION['email']))
{
    header('location:profile.php');
}


$error = "";

// create user
$user = null;

// create an instance of the controller
$UserC = new UserC();
if (
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["email"]) &&    
    isset($_POST["adress"]) &&
    isset($_POST["tel"]) &&
    isset($_POST["dob"])
) {
    if (
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["adress"]) &&
        !empty($_POST["tel"]) &&
        !empty($_POST["dob"]) &&
        !empty($_POST["password"])
    ) {
        $user = new User(
            null,
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['email'],
            $_POST['adress'],
            $_POST['tel'],
            new DateTime($_POST['dob']),
            $_POST['password']
        );
        $UserC->addUser($user);
        //header('Location:profile.php');
        header('Location:login.php');
    }
    } 

/*     session_start();
    $_SESSION['idUser'] = $user['idUser']; */


?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>


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


    <h2 align="center">SIGN UP</h2>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form class="form-horizontal" action="" method="POST" OnSubmit="return validate() ">



            <div class="form-group">
                        
                    <label class="control-label col-sm-2 col-xs-2" for="firstName">First Name: </label>
                <div class="col-sm-10">
                    <input type="text" name="firstName" class="form-control" id="firstName" maxlength="20">
                </div>
            </div>
                        
            <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-2" for="lastName">Last Name:</label>
                <div class="col-sm-10">
                    <input type="text" name="lastName" class="form-control" id="lastName" maxlength="20">
                </div>
            </div>
            <div class="form-group">

                    <label class="control-label col-sm-2 col-xs-2" for="email">Email:</label>
                <div class="col-sm-10">

                    <input type="text"  name="email" class="form-control" id="email">
                </div>
            </div>
                        
            <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-2" for="adress">adress:</label>
                <div class="col-sm-10">

                    <input type="text" name="adress" class="form-control" id="adress">
                </div>
            </div>
                        
            <div class="form-group">

                    <label class="control-label col-sm-2 col-xs-2" for="tel">tel:</label>
                <div class="col-sm-10">

                    <input type="text" name="tel" class="form-control" id="tel">
                </div>
            </div>
                        
            <div class="form-group">

                    <label class="control-label col-sm-2 col-xs-2" for="dob">Date of Birth:</label>
                <div class="col-sm-10">

                    <input type="date" name="dob" class="form-control" id="dob">
                </div>
            </div>
                        
            <div class="form-group">

                    <label class="control-label col-sm-2 col-xs-2" for="password">Password:</label>
                <div class="col-sm-10">

                    <input type="password" name="password" class="form-control" id="password">
                </div>
            </div>
                        
                        
                            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" value="Save" class="btn btn-default">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                                <input type="reset" value="Reset" class="btn btn-default">
                </div>
            </div>
            
    </form>

  


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
                    <p class="margin-top-15">AUTOMEDIC est une entreprise tunisienne cree en 2022 par des passionnes d'automobile qui on eu l'initiative de proumouvoir les voitures dans leurs pays et a l'international tout en prenant en consideration le pouvoir d'achats des moyens des citoyens.Leur idee innovative a permis a n'importe qu elle personne possedant une voiture a ameliorer l'etat de sa voiture sans autant s'endetté.</p>
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
</body>

<script>
function checkEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validate() {
  var email = document.getElementById("email").value;

  if (!checkEmail(email)) {
    alert('Adresse e-mail non valide');
    return false;
  }
  return true;
}
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

</html>