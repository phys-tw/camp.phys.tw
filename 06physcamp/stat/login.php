<?php
session_start();
define('STAT_BASE', dirname(__FILE__));
require STAT_BASE . '/config/config.php';


if (isset($_POST['username']) &&
    isset($_POST['password']) &&
    $_POST['username'] == $conf['admin_username'] &&
    $_POST['password'] == $conf['admin_password']) {

    $admin = array();
    $admin['username'] = $conf['admin_username'];
    $admin['_login'] = 'login';
    $_SESSION['admin'] = $admin;
    header('Location: admin.php');
} else {
    $_SESSION = array();
    session_destroy();
    exit("Error!!!");
}

?>