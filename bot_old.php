
<?php
$access_token = 'SHw1hzSoFFqTMyiAwCMiRlXYkX223Y4cyLm1ZGnazQAyleEW3WWPWtG/CEdgdhjT+mRgtYXDWPjHC5dp8p6+uGzZTB0STH3tGYfPM2onDwZqTmMMeW5h1SQ015zsfEC7MGv2x2ttJaDf0Bo1zvQ5UQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			if($text=="สวัสดี"){
				$text = "สวัสดี";
			} else {
				//$text = "ไม่เข้าใจ ว่าจะถามเรื่องไร";
				$oldid = $text;
				$FileContents = file_get_contents("https://mua.kpru.ac.th/FrontEnd_Tabian/petition/Showstudent/".$oldid);
				$data = json_decode($FileContents,true);
				$data1 = $data[0];
				$text = $data1["PNAME"].$data1["NAME"];
			}

			$messages = [
				'type' => 'text',
				'text' => $text
			];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";


?>









