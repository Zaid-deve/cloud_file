<?php

require_once "../app/user/user.php";
require_once "../app/db/db_conn.php";
$user = new User();
print_r($user::fetchUser($conn, $user->getAuthType(), $user->getUserId(), ['user_name']));
