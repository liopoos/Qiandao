<?php
/**
 * @Author: Mayuko
 * @Date:   2017-01-31 11:12:54
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-01 22:04:54
 */
$uuid = $_GET['u'];
include('./sql.php');
include('./config.php');
$info = mysqli_fetch_array(mysqli_query($link, 'SELECT user,lasttime,role FROM userlist WHERE id = ' . $uuid));
$result = mysqli_query($link, 'SELECT name,nickname,status FROM userstatus WHERE uuid = ' . $uuid);
$res = array();
while ($row = mysqli_fetch_array($result)) {
    $res[] = $row;
}
$sum = mysqli_fetch_array(mysqli_query($link, 'SELECT SUM(num) FROM userstatus WHERE uuid = ' . $uuid));
?>
<div class="panel panel-success">
    <div class="panel-heading">
        用户信息
    </div>
    <div class="panel-body">
        <p>你好，<?php echo $info['user'] ?></p>
        <p><strong>uuid：<?php echo $uuid; ?></strong></p>
        <p><strong>用户组：<?php echo $info['role'] ?></strong></p>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        程序信息
    </div>
    <div class="panel-body">
        <p><strong>签到(beta)</strong>
            <small> 云签到解决方案</small>
        </p>
    </div>
    <ul class="list-group">
        <li class="list-group-item">版本：<?php echo constant('VERSION_SYSTEM'); ?></li>
        <li class="list-group-item">更新日期：<?php echo constant('DATE_SYSTEM'); ?></li>
        <li class="list-group-item">网易云音乐签到版本：<?php echo constant('VERSION_CLOUDMUSIC'); ?></li>
    </ul>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        签到信息
    </div>
    <div class="panel-body">
        <p>已绑定<?php echo $sum['SUM(num)']; ?>个Cookies。</p>
        <p><strong>任务上次执行时间：<?php echo $info['lasttime'] ?></strong></p>
    </div>
    <ul class="list-group">
        <?php for ($i = 0; $i < count($res); $i++): ?>
            <?php if ($res[$i]['status'] == 'SUCCESS'): ?>
                <li class="list-group-item"><?php echo $res[$i]['nickname'] ?><span class="label label-success"
                                                                                    style="float: right;">SUCCESS</span>
                </li>
            <?php else: ?>
                <li class="list-group-item"><?php echo $res[$i]['nickname'] ?><span class="label label-danger"
                                                                                    style="float: right;">FAIL</span>
                </li>
            <?php endif; ?>
        <?php endfor; ?>
    </ul>
</div>
<div class="panel panel-danger">
    <div class="panel-heading">服务器信息</div>
    <ul class="list-group">
        <li class="list-group-item">操作系统：<?php echo php_uname(); ?></li>
        <li class="list-group-item">PHP版本：<?php echo PHP_VERSION; ?></li>
        <li class="list-group-item">文件上传许可：<?php echo ini_get('upload_max_filesize'); ?></li>
        <li class="list-group-item">系统语言：<?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE']; ?></li>
    </ul>
</div>