<?php
/**
 * @Author: Mayuko
 * @Date:   2017-01-31 16:27:10
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-06 12:15:18
 */
$user = $_POST['user'];
$passwd = $_POST['passwd'];
include('../sql.php');
$status = array();
$judge = mysqli_fetch_array(mysqli_query($link, "SELECT 1 FROM userlist WHERE user = '" . $user . "'"));
if ($judge == NULL) {
    $result = mysqli_query($link, 'INSERT INTO userlist(user,passwd,regtime,role) VALUES("' . $user . '","' . $passwd . '","' . date('Y-m-d H:i:s', time()) . '","管理员");');
    if ($result) {
        $status['code'] = 1;
    } else {
        $status['code'] = -2;
    }
} else {
    $status['code'] = -1;
}

echo json_encode($status);

?>