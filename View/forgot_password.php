<?php

include '../Controller/UserC.php';

$error = "";


session_start();


if(isset($_SESSION['email']))
{
    header('location:profile.php');
}

// create user

$user = null;
// create an instance of the controller
$userC = new UserC();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';



// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = 'your email'; // YOUR gmail email
    $mail->Password = 'password'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('your email', 'your name');
    $mail->addAddress('recipient email', 'recipient name');
   
    

    
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}

if(isset($_POST['email']))
{
    $password = uniqid();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 
    
    
    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "recuperation de mot de passe";
    $mail->Body = "voici votre mot de passe $password";
    $mail->AltBody = "voici votre mot de passe $password";
    if($mail->send())
    {
        
            echo "check your email and try to login with your new password ";
            $user = $userC->forgotPassword($password, $_POST['email']);
            
    }
    else 
    {
        if(isset($_POST['email'])) 
            echo 'error mail non envoyé';
    }

    
}


?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/templatemo-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.14/sweetalert2.min.css">

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

    <h1 align="center">Mot de passe oublié</h1>

    <div id="error">
        <?php echo $error; ?>
    </div>




    <form class="form-horizontal" action="" method="POST">


            <div class="form-group">

                    <label class="control-label col-sm-2 col-xs-2" for="email">Email:</label>
                <div class="col-sm-10">

                    <input type="text"  name="email" class="form-control" id="email">
                </div>
            </div>
      
                            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" name="login" value="envoyer" class="btn btn-default">
                </div>
            </div>

            
    </form>
    <a href="login.php">Try to login again?</a>
  


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.14/sweetalert2.all.min.js"></script>
<script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>
  <script src="https://www.google.com/recaptcha/api.js"></script>

</body>





<?php

if($alert ==1) {
print " 
<script>
    Swal.fire({
  icon: 'Something is not right',
  title: 'Oops...',
  text: 'Please verify your email and password!'
})
</script>
"; 
}
?>


</html>