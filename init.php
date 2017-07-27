<?php
/**
 * @Author: Mayuko
 * @Date:   2017-01-30 23:57:38
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-06 12:08:32
 * 测试签到页面，请自行更改参数
 */
header("Content-type: text/html; charset=utf-8");
ini_set("mssql.textsize",200000);
$cookie_file = "_ntes_nnid=525398fcb1a3d69619cea0097ee0a3d4,1487757154822; _ntes_nuid=525398fcb1a3d69619cea0097ee0a3d4; vjuids=152a5c3e5.15ab87cd6bf.0.9323a18ae3235; usertrack=c+5+hlj8ZWONrVx4BUa7Ag==; mail_psc_fingerprint=350c09099fd04ca630e6113d54e5d66d; _ga=GA1.2.1391225034.1492936039; vjlast=1489153874.1499181056.11; __s_=1; vinfo_n_f_l_n3=cfde07fb458d6f64.1.5.1489153873613.1498105821041.1499181096040; P_INFO=g315576249@163.com|1499736911|0|urs|11&10|shd&1496213690&search#shd&370600#10#0#0|159792&0||g315576249@163.com; NTES_CMT_USER_INFO=116170958%7C%E6%9C%89%E6%80%81%E5%BA%A6%E7%BD%91%E5%8F%8B06Xa3e%7Chttps%3A%2F%2Fsimg.ws.126.net%2Fe%2Fimg5.cache.netease.com%2Ftie%2Fimages%2Fyun%2Fphoto_default_62.png.39x39.100.jpg%7Cfalse%7CZzMxNTU3NjI0OUAxNjMuY29t; MUSIC_U=4d014c20a6fe96ea040dcf0869542c23d79be50f96c19067ec9ca1066b88f244bf7ce4077896d2a10adfd7d0723ffef8bf55321ded931149; __remember_me=true; __csrf=b73cde8e917751ab8b060ae883a3c6d4; playerid=79294905; JSESSIONID-WYYY=2YNo6TJNMwQUo3NhgK7WVcuufr1cu0qOndbXc21hYW%5C%5CZFEAn7C4YCjjIO7%2Fxzzo%2BoVU8Y0N7I1%2Fq%2FWiSjmUh31G3%2Fa9f0hCTIfwsem23hF4YkGbNmyqIZbqiTmQTU3G7SO86YyI9YTiAdzFHdDA4NK0M%2FPrjfikK07n6r681%5CpGV0Tg%3A1500809543136; _iuqxldmzr_=32; __utma=94650624.240514329.1487757156.1500710974.1500807743.42; __utmc=94650624; __utmz=94650624.1500807743.42.18.utmcsr=sothx.com|utmccn=(referral)|utmcmd=referral|utmcct=/links/;";
echo initCloumusic($cookie_file, 1);
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
}