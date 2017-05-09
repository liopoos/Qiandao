<?php
/**
 * @Author: Mayuko
 * @Date:   2017-01-31 23:29:40
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-01 11:38:54
 * 网易云音乐cookies删除
 */
include('../sql.php');
$id = $_GET['id'];
$uuid = $_GET['u'];
$status = array();
$result = mysqli_query($link, 'DELETE FROM cloudmusic WHERE id = ' . $id);
if ($result) {
    $result = mysqli_query($link, "UPDATE userstatus SET num = num - 1 WHERE uuid = $uuid");
    if ($result) {
        $status['code'] = 1;
    } else {
        $status['code'] = -1;
    }
} else {
    $status['code'] = -1;
}
echo json_encode($status);
?>