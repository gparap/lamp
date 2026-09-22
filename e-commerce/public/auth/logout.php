<?php
session_start();

require_once '../../config/config.php';
require_once UTILS_PATH . 'functions.php';

log_out_user();

//redirect to login page
header('Location: ' . PUBLIC_URL . 'auth/login.php');
exit;
?>