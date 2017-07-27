<?php
/**
 * @Author: Mayuko
 * @Date:   2017-01-31 12:33:27
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-11 10:16:02
 */
include('./sql.php');
$uuid = $_GET['u'];
$result = mysqli_query($link, 'SELECT id,cookies,status,lasttime FROM cloudmusic WHERE uuid = ' . $uuid);
$res = array();
while ($row = mysqli_fetch_array($result)) {
    $res[] = $row;
}
mysqli_free_result($result);
?>
<div id="cloudmusic-info">
</div>
<div class="well">
    <p><strong>网易云音乐签到</strong>
        <small><?php echo constant('VERSION_CLOUDMUSIC'); ?> / <?php echo constant('AUTHOR_CLOUDMUSIC'); ?></small>
        <button type="button" class="btn btn-default" style="float: right;" id="btn-cloudmusic-now">立即签到</button>
    </p>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">状态</div>
    <div class="panel-body">
        当前显示所有已绑定Cookies列表
    </div>
    <table class="table">
        <tr>
            <th>id</th>
            <th>uuid</th>
            <th>状态</th>
            <th>上次执行时间</th>
        </tr>
        <?php for ($i = 0; $i < count($res); $i++): ?>
            <tr>
                <td><?php echo $res[$i]['id']; ?></td>
                <td><?php echo $uuid; ?></td>
                <td><?php echo $res[$i]['status']; ?></td>
                <td><?php echo $res[$i]['lasttime']; ?></td>
            </tr>
        <?php endfor; ?>

    </table>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        Cookies列表
    </div>
    <table class="table">
        <tr>
            <th>id</th>
            <th>Cookies</th>
            <th>操作</th>
        </tr>
        <?php for ($i = 0; $i < count($res); $i++): ?>
            <tr>
                <td><?php echo $res[$i]['id']; ?></td>
                <td><input class="form-control" value="<?php echo $res[$i]['cookies']; ?>" readonly></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm btn-cloudmusic-delete"
                            id="<?php echo $res[$i]['id']; ?>">删除
                    </button>
                </td>
            </tr>
        <?php endfor; ?>
    </table>
</div>
<div class="panel panel-info">
    <div class="panel-heading">绑定</div>
    <div class="panel-body">
        <form class="form-cloudmusic-add" method="post" action="cloudmusic/addCloudmusic.php">
            <label for="inputEmail">Cookies</label>
            <input type="text" id="input-cloudmusic-cookie" class="form-control" placeholder="请输入Cookies" required
                   autofocus><br>
            <button type="button" class="btn btn-primary" id="cloudmusic-add">添加</button>
        </form>
    </div>
</div>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-warning">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                   aria-expanded="true" aria-controls="collapseOne">
                    如何获取Cookies？
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <h3>以Chrome为例</h3>
                <p>
                    1.从网页版网易云音乐（http://music.163.com）登录
                </p>
                <hr>
                <p>
                    2.在网页空白处右键点击<strong>检查</strong>
                </p>
                <hr>
                <br>
                <p>
                    3.点击<strong>Network</strong>标签
                    <img src="./images/chrome-1.jpg" alt="" class="img-rounded" style="width: 100%">
                </p>
                <hr>
                <br>
                <p>
                    4.找到左侧的music.163.com，点击
                    <img src="./images/chrome-2.jpg" alt="" class="img-rounded" style="width: 100%">
                </p>
                <hr>
                <br>
                <p>
                    5.复制<strong>Cookies</strong>到上面的添加框即可添加。
                    <img src="./images/chrome-3.jpg" alt="" class="img-rounded" style="width: 100%">
                </p>
            </div>
        </div>
    </div>
</div>