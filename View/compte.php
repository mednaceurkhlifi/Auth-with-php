<?php

include '../Controller/UserC.php';

session_start();


/* if(!isset($_SESSION['email']))
{
    header('location:profile.php');
}  */

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
        $UserC->updateUser($user, $_POST["idUser"]);
        header('Location:profile.php');
    }
    } 

?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>


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
                    <li><a href="http://localhost/automedic1/integration front/index.html" class="active">Home</a></li>
                        <li><a href="products.html">Cars</a></li>
                        <li><a href="http://localhost/modification/view/addmodification.php">Custom</a></li>
                        <li><a href="http://localhost/automedic1/projetWeb/add_post.php">Forum</a></li>
                        <li><a href="http://localhost/reclamation/View/addReclamation.php">support</a></li>
                       
                    </ul>
                </nav>
            </div>
        </div>

    </section>


    <h2 align="center">Update Profile</h2>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idUser'])) {
        $user = $UserC->showUser($_POST['idUser']);

    ?>

    <form class="form-horizontal" action="compte.php" method="POST">


            <div class="form-group">
                        
                        <label class="control-label col-sm-2 col-xs-2" for="idUser">Id: </label>
                <div class="col-sm-10">
                        <input type="text" name="idUser" value="<?php echo $user['idUser']; ?>" class="form-control" id="firstName" maxlength="20">
                </div>
            </div>


            <div class="form-group">
                        
                    <label class="control-label col-sm-2 col-xs-2" for="firstName">First Name: </label>
                <div class="col-sm-10">
                    <input type="text" name="firstName" value="<?php echo $user['firstName']; ?>" class="form-control" id="firstName" maxlength="20">
                </div>
            </div>
                        
            <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-2" for="lastName">Last Name:</label>
                <div class="col-sm-10">
                    <input type="text" name="lastName" value="<?php echo $user['lastName']; ?>" class="form-control" id="lastName" maxlength="20">
                </div>
            </div>
            <div class="form-group">

                    <label class="control-label col-sm-2 col-xs-2" for="email">Email:</label>
                <div class="col-sm-10">

                    <input type="text"  name="email" value="<?php echo $user['email']; ?>" class="form-control" id="email">
                </div>
            </div>
                        
            <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-2" for="adress">adress:</label>
                <div class="col-sm-10">

                    <input type="text" name="adress" value="<?php echo $user['adress']; ?>" class="form-control" id="adress">
                </div>
            </div>
                        
            <div class="form-group">

                    <label class="control-label col-sm-2 col-xs-2" for="tel">tel:</label>
                <div class="col-sm-10">

                    <input type="text" name="tel" value="<?php echo $user['tel']; ?>" class="form-control" id="tel">
                </div>
            </div>
                        
            <div class="form-group">

                    <label class="control-label col-sm-2 col-xs-2" for="dob">Date of Birth:</label>
                <div class="col-sm-10">

                    <input type="date" name="dob" value="<?php echo $user['dob']; ?>" class="form-control" id="dob">
                </div>
            </div>
                        
            <div class="form-group">

                    <label class="control-label col-sm-2 col-xs-2" for="password">Password:</label>
                <div class="col-sm-10">

                    <input type="password" name="password" value="<?php echo $user['password']; ?>" class="form-control" id="password">
                </div>
            </div>
             
                        
                            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" value="Update" class="btn btn-default">
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
</body>
    
</html>
    <?php

    }
    ?>