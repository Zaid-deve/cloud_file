<?php

require_once '../../../google_api/vendor/autoload.php';
require_once "../../php/config/config.php";
require_once "../../db/db_conn.php";
require_once '../user.php';

$client = new Google_Client();
$client->setAuthConfig("../../../google_api/credentials.json");
$client->addScope(['email', 'profile']);

if (isset($_GET['code'])) {
    try {
        // get access token
        $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $token = $client->getAccessToken()['access_token'];
        $_SESSION['access_token'] = $token;
        $client->setAccessToken($token);

        // Get user information
        $curl = curl_init("https://www.googleapis.com/oauth2/v1/userinfo?access_token=$token");
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $token",
                "Accept: application/json"
            ]
        ]);

        $response = curl_exec($curl);

        if (curl_error($curl)) {
            throw new Exception('Fetch User Info Failed !');
        }
        $response = json_decode($response, true);

        $email = $response['email'];
        $name = $response['name'];
        $profile = $response['picture'];

        // store
        $user = new User();
        $enc_email = base64_encode($email);
        $enc_name = base64_encode($name);

        $stmt = myQuery($conn, "SELECT * FROM google_users WHERE user_email = ?", [$enc_email]);
        if ($stmt && $stmt->rowCount()) {
            $uid = $stmt->fetch(PDO::FETCH_ASSOC)['user_id'];
            $user->setUserId($uid,"google");
        } else {
            $stmt1 = myQuery($conn, "INSERT INTO google_users (user_email,user_name, user_profile) VALUES (?,?,?)", [$enc_email, $enc_name, $profile]);
            if ($stmt1 && $stmt1->rowCount()) {
                $user->setUserId($conn->lastInsertId(),"google");
                header("Location:../../");
                die();
            }
        }
    } catch (Exception $e) {}
}

header("Location:../signin.php?error=1");
die();
