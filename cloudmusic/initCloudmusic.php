<?php
/**
 * @Author: Mayuko
 * @Date:   2017-02-01 00:35:31
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-06 12:08:48
 * 网易云音乐初始化
 */

$result = startCloudmusic();
echo $result;

function startCloudmusic()
{
    include(dirname(__FILE__) . '/../sql.php');
    $uuid = 0;
    $file = fopen(dirname(__FILE__) . '/cloudmusic.log', 'a+');
    $time = date('Y-m-d H:i:s', time());
    $uuid = isset($_GET['u']) ? intval($_GET['u']) : 0;
    $status = array();
    if ($uuid == 0) {
        $result = mysqli_query($link, 'SELECT id,cookies,uuid FROM cloudmusic');
        fwrite($file, "$time" . "：启动全部任务\n");

    } else {
        $result = mysqli_query($link, 'SELECT id,cookies,uuid FROM cloudmusic WHERE uuid = ' . $uuid);
        fwrite($file, "$time" . "：启动uuid为" . $uuid . "的任务\n");
    }
    $res = array();
    while ($row = mysqli_fetch_array($result)) {
        $res[] = $row;
    }
    mysqli_free_result($result);
    $status['num'] = count($res);
    if (count($res) == 0) {
        $status['code'] = -2;
        $status['msg'] = "请先绑定Cookies";
    }
    for ($i = 0; $i < count($res); $i++) {
        $back = json_decode(initCloumusic($res[$i]['cookies'], 0), true);
        $back = json_decode(initCloumusic($res[$i]['cookies'], 1), true);
        $time = date('Y-m-d H:i:s', time());
        if ($back['code'] == 200) {
            $result = mysqli_query($link, "UPDATE cloudmusic SET status = \"签到正常\" , lasttime = \"$time\" WHERE id = " . $res[$i]['id']);
            $result = mysqli_query($link, "UPDATE userstatus SET status = \"SUCCESS\" WHERE uuid = " . $res[$i]['uuid']);
            $status['msg'] = "签到正常";
            fwrite($file, "$time" . "：id" . $res[$i]['id'] . "签到正常\n");
        } elseif ($back['code'] == -2) {
            $result = mysqli_query($link, "UPDATE cloudmusic SET status = \"签到正常\" , lasttime = \"$time\" WHERE id = " . $res[$i]['id']);
            $result = mysqli_query($link, "UPDATE userstatus SET status = \"SUCCESS\" WHERE uuid = " . $res[$i]['uuid']);
            $status['msg'] = "签到正常";
            fwrite($file, "$time" . "：id" . $res[$i]['id'] . "签到正常\n");
        } else {
            $result = mysqli_query($link, "UPDATE cloudmusic SET status = \"签到异常\" , lasttime = \"$time\" WHERE id = " . $res[$i]['id']);
            $result = mysqli_query($link, "UPDATE userstatus SET status = \"FAIL\" WHERE uuid = " . $res[$i]['uuid']);
            $status['msg'] = "签到异常，请确定Cookies是否正确。";
            fwrite($file, "$time" . "：id" . $res[$i]['id'] . "签到异常\n");
        }
        $result = mysqli_query($link, "UPDATE userlist SET lasttime = \"$time\" WHERE id = " . $res[$i]['uuid']);
    }
    if ($result) {
        $status['code'] = 1;
    } else {
        $status['code'] = -1;
    }
    fwrite($file, "$time" . "：签到任务执行完毕\n");
    fclose($file);
    return json_encode($status);
}

function initCloumusic($cookie_file, $type)
{
    $url = "http://music.163.com/api/point/dailyTask?type=" . $type;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array(
        "Pragma:no-cache",
        "DNT:1",
        "Accept-Encoding:gzip, deflate, sdch",
        "Accept-Language:en,zh-CN;q=0.8,zh;q=0.6",
        "User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.30 Safari/537.36",
        "Content-Type:application/x-www-form-urlencoded",
        "Accept:*/*",
        "Cache-Control:no-cache",
        "Referer:http://music.163.com/discover",
        "Connection:keep-alive",
        "Cookie:$cookie_file"
    ));
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
    return $response;
}

?>