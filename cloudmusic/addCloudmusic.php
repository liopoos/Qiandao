<?php
/**
 * @Author: Mayuko
 * @Date:   2017-01-31 23:29:40
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-04 11:07:03
 * 网易云音乐cookies绑定
 */
include('../sql.php');
$uuid = $_POST['u'];
$cookies = $_POST['c'];
$check = json_decode(checkCloumusic($cookies), true);
if ($check['code'] == 301) {
    $status['code'] = -2;
} else {
    $status = array();
    $result = mysqli_query($link, 'INSERT INTO cloudmusic(uuid,cookies) VALUES("' . $uuid . '","' . $cookies . '");');
    if ($result) {
        $judge = mysqli_fetch_array(mysqli_query($link, "SELECT 1 FROM userstatus WHERE uuid = '" . $u . "'"));
        if ($judge == NULL) {
            $result = mysqli_query($link, 'INSERT INTO userstatus(uuid,name,nickname,status,num) VALUES(' . $uuid . ',"cloudmusic","网易云音乐签到","FAIL",1);');

            if ($result) {
                $status['code'] = 1;
            } else {
                $status['code'] = -1;
            }
        } else {
            $result = mysqli_query($link, "UPDATE userstatus SET num = num + 1 WHERE uuid = $uuid");
            if ($result) {
                $status['code'] = 1;
            } else {
                $status['code'] = -1;
            }
        }


    } else {
        $status['code'] = -3;
    }
}

function checkCloumusic($cookie_file)
{
    $url = "http://music.163.com/api/point/dailyTask?type=0";
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
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

echo json_encode($status);
?>