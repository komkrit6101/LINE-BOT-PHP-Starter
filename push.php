
<?php


$access_token = 'SHw1hzSoFFqTMyiAwCMiRlXYkX223Y4cyLm1ZGnazQAyleEW3WWPWtG/CEdgdhjT+mRgtYXDWPjHC5dp8p6+uGzZTB0STH3tGYfPM2onDwZqTmMMeW5h1SQ015zsfEC7MGv2x2ttJaDf0Bo1zvQ5UQdB04t89/1O/w1cDnyilFU=';




			$url = 'https://api.line.me/v2/bot/message/push';

			$messages = [
						'type' => $_POST['type'],
						'text' => $_POST['text']
					];


  

			$data = [
				'to' => 'Ude8479a7aa0cf30046c59823213c96ec',
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



?>









