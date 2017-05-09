<?php
/**
 * @Author: Mayuko
 * @Date:   2017-02-05 16:59:10
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-05 17:18:59
 */

echo "code:\n";
include(dirname(__FILE__) . '/cloudmusic/initCloudmusic.php');

$time = date('Y-m-d H:i:s', time());
echo "status:$time:success";
?>