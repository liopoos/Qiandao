<?php
/**
 * @Author: Mayuko
 * @Date:   2017-01-31 16:54:52
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-01 21:54:06
 * 数据库链接文件
 */
include('config.php');
$link = mysqli_connect(constant('DB_HOST'), constant('DB_USER'), constant('DB_PASSWD')) or die("die" . mysql_error());
$db_selected = mysqli_select_db($link, constant('DB_NAME'));
mysqli_query($link, "set names utf8");
date_default_timezone_set('PRC');
?>