<?php
$access_token = 'SHw1hzSoFFqTMyiAwCMiRlXYkX223Y4cyLm1ZGnazQAyleEW3WWPWtG/CEdgdhjT+mRgtYXDWPjHC5dp8p6+uGzZTB0STH3tGYfPM2onDwZqTmMMeW5h1SQ015zsfEC7MGv2x2ttJaDf0Bo1zvQ5UQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
