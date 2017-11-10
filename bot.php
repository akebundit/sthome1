<?php
$access_token = 'vpDU20J5q8oBp5eWn7KGiuDQ33fiAyVcLhJHjrGu5UqHUcukEpMEGX79r1XoB/kVIWdB1bgI5GgK/7Rk0I6YcZSE8s6qZb7qxuteK3xtadxnqtx36c8aS4Le4ft6whMSLv90YBFgj5SVR8Q1ROZjCQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text' && substr($event['message']['text'],0,4) == 'lamo' ) {
			$aa = strpos($event['message']['text'],' ');
			$bb  = strlen($event['message']['text']);	
			$an = substr($event['message']['text'],$aa , $bb );
			// Get text sent
		        $conn =  mysqli_connect('203.150.230.190', 'klangplaza', 'yos_aha','bot');
			$sql = 'select * from ans where q like '. $an . '%' ; 
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0 ) {
				$row = mysqli_fetch_assoc($result)
					$ans = $rom['a'];
			}
				else
				{
					
					$ans='ไม่รู้เรื่อง';
				}
		
	              	mysqli_close($conn);      
	
		
			// คำตอบ
			
			
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $ans
				//$text
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
