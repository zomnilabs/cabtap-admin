<?php

return [
	'driver'      => env('FCM_PROTOCOL', 'http'),
	'log_enabled' => true,

	'http' => [
		'server_key'       => env('FCM_SERVER_KEY', 'AAAAz5jbgvI:APA91bHhWv5Ex-k7rgy0XwhYi1mUGP5VWuHCR10oGI7o7skWWE_agrMTmunp876j9tCGM4V8DjvqFV7dKpO_EDegSGeLQu9W4Qe276VpG7S8MYipfpLXYNvwcpyJMMa1rxM4vTCY3nUHeG0Dwp1Cn_d6sQb1zDNyVA'),
		'sender_id'        => env('FCM_SENDER_ID', '891622753010'),
		'server_send_url'  => 'https://fcm.googleapis.com/fcm/send',
		'server_group_url' => 'https://android.googleapis.com/gcm/notification',
		'timeout'          => 30.0, // in second
	]
];
