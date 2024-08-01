<?php

require_once "user.php";
$user = new User(true);
if($user->getUserId()){
    $user->logout();
}
header("Location:signin.php");

?>