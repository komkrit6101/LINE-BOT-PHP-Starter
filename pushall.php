
<?php


$access_token = 'SHw1hzSoFFqTMyiAwCMiRlXYkX223Y4cyLm1ZGnazQAyleEW3WWPWtG/CEdgdhjT+mRgtYXDWPjHC5dp8p6+uGzZTB0STH3tGYfPM2onDwZqTmMMeW5h1SQ015zsfEC7MGv2x2ttJaDf0Bo1zvQ5UQdB04t89/1O/w1cDnyilFU=';



			// if(count($datamessage) != 0 )
			// switch ($datamessage['type']) {
			// 	case 'text':
			// 		$messages = [
			// 			'type' => 'text',
			// 			'text' => $datamessage['text']
			// 		];
			// 		break;
			// 	case 'image':
			// 		$messages = [
			// 			'type' => 'text',
			// 			'originalContentUrl' => $datamessage['originalContentUrl'],
   //  					'previewImageUrl' => $datamessage['previewImageUrl']
			// 		];
			// 		break;	
			// 	case 'video':
			// 		$messages = [
			// 			'type' => 'video',
   //  					'originalContentUrl' => $datamessage['originalContentUrl'],
   //  					'previewImageUrl' => $datamessage['previewImageUrl']
			// 		];
			// 		break;	
			// 	case 'audio':
			// 		$messages = [
			// 			'type' => 'audio',
   //  					'originalContentUrl' => $datamessage['originalContentUrl'],
   // 						'duration' => $datamessage['duration']
			// 		];
			// 		break;
			// 	case 'location':
			// 		$messages = [
			// 			'type' => 'location',
			// 	    	'title' => $datamessage['title'],
			// 		    'address' => $datamessage['address'],
			// 		    'latitude' => $datamessage['latitude'],
			// 		    'longitude' => $datamessage['longitude']
			// 		];
			// 		break;	
			// 	case 'sticker':
			// 		$messages = [
			// 			'type' => 'sticker',
			// 			'packageId' => $datamessage['packageId'],
			// 			'stickerId' => $datamessage['stickerId']
			// 		];
			// 		break;
			// }

		
			/////////////
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/multicast';

			$messages = [
						'type' => 'text',
						'text' => 'ทดสอบ'
					];


			$data_user = array('Ude8479a7aa0cf30046c59823213c96ec','Udda5d67b0a09cbdaddbbb7f230ed25a6')

			$data = [
				'to' => $data_user,
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









