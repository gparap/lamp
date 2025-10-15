<?php
session_start();

//destroy all session data
if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
    $_SESSION = []; //empty session var

    //delete the session cookie in the browser
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 1, //just expired 1 sec ago!
        $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    }
}

//redirect to login page
$location = "https://localhost/e-library/public/auth/login.php";
echo '<script>window.location.href = "' . $location . '";</script>';
?>