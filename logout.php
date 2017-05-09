<?php
/**
 * @Author: Mayuko
 * @Date:   2017-01-31 17:56:09
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-01-31 18:40:34
 */
session_start();
if (isset($_SESSION['user'])) {
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600);
    }
    session_destroy();
}
setcookie('user', '', time() - 3600);
session_unset();
header("Location: login.php?s=1");
?>