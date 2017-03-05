<?php

class OnesignalHelper {
	public static function sendPushNotification($article_title, $article_link, $article_id, $category_id) {
		// Key & ID
		$onesignal_app_id = "";
		$onesignal_rest_key = "";
		// API endpoint
		$url = 'https://onesignal.com/api/v1/notifications';
		// Header with basic authentication
		$header = array("Content-Type: application/json; charset=utf-8", 'Authorization: Basic ' . $onesignal_rest_key);
		// Notification's content 
		$contents = array('en' => $article_title);
		// Segments
		$segments = array("All");
		// Custom data
		$additional_data = array('article_id' => $article_id, 'category_id' => $category_id);

		// HTTP request data
		$data = array('app_id' => $onesignal_app_id, 'contents' => $contents, 'data' => $additional_data, 'included_segments' => $segments);
		$options = array(
		    'http' => array(
		        'header'  => $header,
		        'method'  => 'POST',
		        'content' => json_encode($data)
		    )
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		return $result;
	}	
}

?>