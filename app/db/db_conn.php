<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "cloud_manager";
$conn = null;
$dbErr = null;

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    $dbErr = $e->getMessage();
    die($dbErr);
}

function myQuery($conn, $qry, $params)
{
    $qry = trim($qry);
    $stmt = $conn->prepare($qry);
    $stmt->execute($params);
    return $stmt;
}
