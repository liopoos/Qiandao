<?php
/**
 * @Author: Mayuko
 * @Date:   2017-01-30 23:57:38
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-06 12:08:32
 * 测试签到页面，请自行更改参数
 */
//header("Content-type: application/json");
$cookie_file = "";
echo initCloumusic($cookie_file, 1);
function initCloumusic($cookies, $type)
{
    $url = "http://langren23.51shousha.com/WereWolfService/AddSigninService";
    $ch = curl_init($url);
    $cookie_file = $cookies;
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array(
        "Pragma:no-cache",
        "DNT:1",
        "Accept-Encoding:gzip, deflate, sdch",
        "Accept-Language:en,zh-CN;q=0.8,zh;q=0.6",
        "User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.30 Safari/537.36",
        "Content-Type:application/x-www-form-urlencoded",
        "Accept:*/*",
        "Cache-Control:no-cache",
        "Referer:http://langren10.51shousha.com/WereWolfService/AddSigninService",
        "Connection:keep-alive",
        "Cookie:$cookie_file"
    ));
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}