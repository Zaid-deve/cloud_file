<?php
require_once "php/config/config.php";

require_once "includes/head.php";
?>
<link rel="stylesheet" href="app/styles/error404.css">
</head>

<body class="vh-100 vw-100 d-flex">

    <!-- NOT FOUND BODY -->
    <div class="container m-auto text-center">
        <div class="error404">404</div>
        <h1 class="error404-header mt-3">Oops, This Page Could Not Be Found.</h1>
        <p class="404-text">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
        <div class="d-flex">
            <a class="btn btn-primary px-4 py-2 mt-2 mx-auto" href="/cloud_file_system/"><span class="fw-bolder">Go To Home</span></a>
        </div>
    </div>

</body>

</html>