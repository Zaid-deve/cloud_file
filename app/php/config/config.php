<?php 

// timezone
date_default_timezone_set("Asia/Kolkata");

// default php variables
$host = $_SERVER['SERVER_NAME'];
$scheme = $_SERVER['REQUEST_SCHEME'];
$basedir = "/cloud_file_system";
$root = $_SERVER['DOCUMENT_ROOT'] . $basedir;
$httpurl = "$scheme://$host" . $basedir;

// default response variable 
$response = [
    'Success' => false,
    'Err' => null
];