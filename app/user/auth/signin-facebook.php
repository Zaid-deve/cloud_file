<?php

use Facebook\Facebook;

require_once '../../../facebook_api/vendor/autoload.php';
require_once "../../php/config/config.php";
require_once "../../db/db_conn.php";
require_once '../user.php';

$user = new User();

$fbConfig = json_decode(file_get_contents("../../../facebook_api/credentials.json"), true);
$fb = new Facebook($fbConfig);
$fbHelper = $fb->getRedirectLoginHelper();


try {
    if (isset($_GET['state'])) {
        $fbHelper->getPersistentDataHandler()->set("state", $_GET['state']);
    }

    $accessToken = $fbHelper->getAccessToken();
    if ($accessToken) {
        $response = $fb->get('/me?fields=name,email,picture', $accessToken->getValue());
        $data = $response->getGraphUser();


        $name = $data['name'];
        $email = $data['email'];
        $profile = $data['picture']['url'];

        // store
        $enc_email = base64_encode($email);
        $enc_name = base64_encode($name);

        $stmt = myQuery($conn, "SELECT * FROM facebook_users WHERE user_email = ?", [$enc_email]);
        if ($stmt) {
            if ($stmt->rowCount()) {
                $uid = $stmt->fetch(PDO::FETCH_ASSOC)['user_id'];
                $user->setUserId($uid,"facebook");
                header("Location:../../");
            } else {
                $stmt1 = myQuery($conn, "INSERT INTO facebook_users (user_email,user_name, user_profile) VALUES (?,?,?)", [$enc_email, $enc_name, $profile]);
                if ($stmt1 && $stmt1->rowCount()) {
                    $user->setUserId($conn->lastInsertId(),"facebook");
                    header("Location:../../");
                    die();
                }
            }
        }
    }
} catch (Exception $e) {}

header("Location:../signin.php?error=1");