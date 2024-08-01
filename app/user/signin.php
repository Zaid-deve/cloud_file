<?php

require_once '../../google_api/vendor/autoload.php';
require_once "../../facebook_api/vendor/autoload.php";
require_once "../php/config/config.php";
require_once "../db/db_conn.php";
require_once 'user.php';

use Facebook\Facebook;

$user = new User();
if ($user->getUserId()) {
    header("Location:../");
    die();
}

// google login setup
$google_client = new Google_Client();
$google_client->setAuthConfig("../../google_api/credentials.json");
$google_client->addScope(['email', 'profile']);
$googleAuthUrl = $google_client->createAuthUrl();

// facebook login setup

$fbConfig = json_decode(file_get_contents("../../facebook_api/credentials.json"), true);
$fb = new Facebook($fbConfig);
$fbHelper = $fb->getRedirectLoginHelper();
$fbAuthUrl = $fbHelper->getLoginUrl("https://localhost/cloud_file_system/app/user/auth/signin-facebook.php", ['email', 'public_profile']);

require_once "../includes/head.php";

?>

</head>

<body class="vh-100 d-flex flex-center">

    <!-- SIGN IN -->
    <div class="container pt-5">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 m-auto">
                <form action="#" id="signinForm">
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="d-flex gap-2">
                                <i class='bx bx-error-circle h3 m-0'></i>
                                Something Went Wrong, Failed To Log In, Please Try Again !
                                <button type="button" class="btn btn-close" onclick="this.closest('.alert').classList.remove('show')">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    <?php } ?>
                    <h1 class="m-0">Sign In</h1>
                    <p class="text-muted">Your data is safe with us</p>
                    <div class="sigin-body">
                        <a href="<?php echo $googleAuthUrl ?>" class="btn btn-stroke py-2 px-3 d-flex gap-3 align-items-center rounded-3" onclick="$(this).addClass('btn-working').next()[0].disabled = true">
                            <i class='bx bx-loader-alt loader-icon'></i>
                            <i class='bx bxl-google'></i>
                            <span class="fw-bold">Signin With Google</span>
                        </a>
                        <a href="<?php echo $fbAuthUrl ?>" class="btn btn-primary py-2 px-3 d-flex gap-3 align-items-center rounded-3 mt-3" onclick="$(this).addClass('btn-working').prev()[0].disabled = true">
                            <i class='bx bx-loader-alt loader-icon'></i>
                            <i class='bx bxl-facebook'></i>
                            <span class="fw-bold">Signin With Facebook</span>
                        </a>
                    </div>
                    <hr>
                    <p class="text-center mt-3">By continue you agreed to our terms and services</p>
                </form>
            </div>
        </div>
    </div>

</body>

</html>