<?php


$json_string = file_get_contents('php://input');
$jsonObj = json_decode($json_string); //รับ JSON มา decode เป็น StdObj 
$to = $jsonObj->{"result"}[0]->{"content"}->{"from"}; //หาผู้ส่ง 
$text = $jsonObj->{"result"}[0]->{"content"}->{"text"}; //หาข้อความที่โพสมา 

$text_ex = explode(':', $text); //เอาข้อความมาแยก : ได้เป็น Array


if($text == 'บอกมา'){//คำอื่นๆ ที่ต้องการให้ Bot ตอบกลับเมื่อโพสคำนี้มา เช่นโพสว่า บอกมา ให้ตอบว่า ความลับนะ 
	$response_format_text = ['contentType'=>1,"toType"=>1,"text"=>"ความลับนะ"]; 
}else{  //นอกนั้นให้โพส สวัสดี 
	$response_format_text = ['contentType'=>1,"toType"=>1,"text"=>"สวัสดี"]; 
} 


$post_data = ["to"=>[$to],"toChannel"=>"1502345616","eventType"=>"d97d606e8e84cd450283992243e66507","content"=>$response_format_text]; //ส่งข้อมูลไป 
$ch = curl_init("https://trialbot-api.line.me/v1/events"); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data)); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
	'Content-Type: application/json; charser=UTF-8', 
	'X-Line-ChannelID: YOUR ChannelID', 
	'X-Line-ChannelSecret: YOUR ChannelSecret',
	 'X-Line-Trusted-User-With-ACL: YOUR MID'
  )); 
$result = curl_exec($ch); 
curl_close($ch); 


?>









