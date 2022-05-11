<?php
$url = 'https://www.furagon.com/sign.php?mod=sign&operation=qiandao&format=global_usernav_extra&formhash=7bd31614&inajax=1&ajaxtarget=k_misign_topb';
$tou = '
Host: www.furagon.com
Connection: keep-alive
User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.25 Safari/537.36 Core/1.70.3880.400 QQBrowser/10.8.4554.400
X-Requested-With: XMLHttpRequest
Accept: */*
Referer: https://www.furagon.com/
Accept-Encoding: gzip, deflate, br
Accept-Language: zh-CN,zh;q=0.9
Cookie: 你的Cookie
';
$options = array(
    'http' => array(
    'method' => 'GET',
    'header' => $tou,
    'timeout' => 15 * 60
    )
);
header('Content-type: text/txt');
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
preg_match('/\[今日已签\]/', $result, $matches);
$qian = $matches[0];
if ($qian == "[今日已签]"){
    echo "签到成功";
}else{
    echo "签到失败";
}
?>

