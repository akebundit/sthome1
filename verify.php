<?php
$access_token = 'RxwV5wSzhC0GL8Efi5yA6vZZFH3bA2RJKQuu4hBLFnDRM3xOaIS1YGBY5Cn5krfsIWdB1bgI5GgK/7Rk0I6YcZSE8s6qZb7qxuteK3xtadyTA+6VOKsdnviPY3xoKc9zCyrhO8GTEecX0pgP/woW7gdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
