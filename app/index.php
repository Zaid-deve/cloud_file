<?php

require_once "./php/config/config.php";
require_once "./db/db_conn.php";
require_once "./user/user.php";
require_once "includes/head.php";

$user = new User(true);
$uid = $user->getUserId();


?>

<link rel="stylesheet" href="styles/sidebar.css">
<link rel="stylesheet" href="styles/main.css">
</head>

<body>

    <!-- BODY -->

    <div class="cotainer-fluid p-0">
        <div class="row vh-100 m-0 g-0">
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 h-100 sidebar-container bg-white">
                <?php require_once "includes/sidebar.php"; ?>
            </div>
            <div class="col h-100">
                <div class="content-container d-flex flex-column h-100">
                    <?php require_once "includes/contentHeader.php" ?>
                </div>
            </div>
        </div>
    </div>

    <!-- POPUPS -->

    <!-- SCRIPTS -->

</body>

</html>