<?php
/**
 * @Author: Mayuko
 * @Date:   2017-01-31 17:39:38
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-01-31 17:58:47
 */
session_start();
$user = $_POST['user'];
$passwd = $_POST['passwd'];
include('../sql.php');
$status = array();
$result = mysqli_fetch_array(mysqli_query($link, 'SELECT user,passwd FROM userlist WHERE user = "' . $user . '"'));
if ($result == NULL) {
    $status['code'] = -2;
} else {
    if ($passwd == $result[1]) {
        $_SESSION['user'] = $user;
        setcookie("user", $user, time() + 2 * 7 * 24 * 3600);
        $status['code'] = 1;
    } else {
        $status['code'] = -1;
    }
}

echo json_encode($status);
?>