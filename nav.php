<?php
/**
 * @Author: Mayuko
 * @Date:   2017-01-31 11:12:54
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-01 22:05:56
 */
$uuid = mysqli_fetch_array(mysqli_query($link, 'SELECT id FROM userlist WHERE user ="' . $_SESSION['user'] . '"'));
$uuid = $uuid['id'];
$cm_count = mysqli_fetch_array(mysqli_query($link, "SELECT num FROM userstatus WHERE uuid = $uuid AND name = \"cloudmusic\""));
?>
<div class="list-group">
    <a href="#" class="list-group-item" id="profile-home">个人中心</a>
    <a href="./logout.php" class="list-group-item" id="logout-home">注销</a>
</div>
<div class="list-group">
    <a href="#" class="list-group-item" id="cloudmusic-home">网易云音乐签到<span
                class="badge"><?php echo $cm_count['num'] ?></span></a>
    <a href="http://tieba.istack.cc" target="_blank" class="list-group-item" id="tieba-home">百度贴吧签到</a>
</div>
<div class="list-group">
    <a href="#" class="list-group-item" id="about-home">关于</a>
    <!-- <a href="#" class="list-group-item" id="update-home">检查更新</a> -->
    <a href="https://blog.mayuko.cn/" class="list-group-item" target="_blank">A hades project</a>
</div>