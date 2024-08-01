<?php

class User
{
    function __construct($redirect = false)
    {
        global $httpurl;
        if (!session_id()) {
            session_start();
        }

        if ($redirect && !$this->getUserId()) {
            header("Location: $httpurl/app/user/signin.php");
            exit();
        }
    }

    function setUserId($userId, $authType, $isCookie = false, $expiry = null)
    {
        if ($userId) {
            if ($isCookie) {
                setcookie("user_id", $userId, $expiry ?? (time() + 3600 * 24), "/");
            } else {
                $_SESSION['user_id'] = $userId;
            }

            if ($authType) {
                if ($isCookie) {
                    setcookie("auth_type", $authType, $expiry ?? (time() + 3600 * 24), "/");
                } else {
                    $_SESSION['auth_type'] = $authType;
                }
            }
        }
    }

    static function fetchUser($conn, $authType, $compare, $returns = [])
    {
        $cols = implode(',', $returns);
        if (empty($cols)) $cols = "*";

        $stmt = $conn->prepare("SELECT $cols FROM {$authType}_users WHERE user_id = :compare OR user_email = :compare");
        $stmt->execute([":compare" => $compare]);
        if ($stmt && $stmt->rowCount()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    function getUserId()
    {
        return $_SESSION['user_id'] ?? $_COOKIE['user_id'] ?? null;
    }

    function getAuthType()
    {
        return $_SESSION['auth_type'] ?? $_COOKIE['auth_type'] ?? null;
    }

    function logout()
    {
        session_unset();
        session_destroy();
        if (isset($_COOKIE['user_id'])) {
            setcookie('user_id', '', time() - 24, '/');
            setcookie('auth_type', '', time() - 24, '/');
        }
    }
}
