<?php
/**
 * @Author: Mayuko
 * @Date:   2017-02-01 13:02:15
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-06 13:15:32
 */
include('./config.php');
?>
<div class="panel panel-success">
    <div class="panel-heading">关于</div>
    <div class="panel-body">
        <h3>签到(beta)</h3>
        <small><?php echo constant('VERSION_SYSTEM'); ?></small>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">建立定时任务</div>
    <div class="panel-body">
        <p>
            签到(beta)的原理是获取你登录的Cookies并进行模拟签到。在该系统的使用过程中，系统将保存你的Cookies，如果你不放心该系统的安全性，也可以将本系统搭建在你自己的服务器中。
        </p>
        <p>搭建完成后使用
            <mark>crontab</mark>
            命令执行定时任务。
        </p>
        <h3>以Cent OS为例</h3>
        <p><strong>安装</strong></p>
        <pre>yum -y install vixie-cron<br>yum -y install crontabs</pre>
        <p><strong>重启服务</strong></p>
        <pre>service crond restart</pre>
        <p><strong>编辑任务</strong></p>
        <pre>crontab -e</pre>
        <p><strong>每天02:00执行签到任务</strong></p>
        <pre>0 2 * * * /html/server/php/bin/php /html/www/do.php >> /html/www/cloudmusic/corntab.log
    </pre>
        <div class="panel panel-default">
            <div class="panel-body">
                基本格式 :
                *　　*　　*　　*　　*　　command<br>
                分　时　日　月　周　命令 <br>
                第1列表示分钟1～59 每分钟用*或者 */1表示 <br>
                第2列表示小时1～23（0表示0点） <br>
                第3列表示日期1～31 <br>
                第4列表示月份1～12 <br>
                第5列标识号星期0～6（0表示星期天） <br>
                第6列要运行的命令 <br>
            </div>
        </div>

    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">安装</div>
    <div class="panel-body">
        <p><strong>git clone</strong></p>
        <pre>https://git.coding.net/mayuko2012/Qiandao.git</pre>
        <p><strong>编辑config.php</strong></p>
        <p>修改数据库地址，用户名，密码</p>
        <p><strong>导入数据库(qiandao.sql)</strong></p>
        <p><strong>复制文件到服务器</strong></p>
        <p><strong>完成！</strong></p>
    </div>
</div>