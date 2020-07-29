<?php
	include 'steam.php';
	session_start();

 $response = SteamLogin::validate();

 $api_key = "65AFDC850DC5AF14C4D835572FD53DF0";


 if( empty( $response ) ) {
	 echo 'The Steam Login request has now expired, please try again.';
 }
 else {
	 $steamid = $response;
	 //ID pescalate: 76561198255431209

	 $api_url = "https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$api_key&steamids=$steamid";

		$json = json_decode(file_get_contents($api_url), true);

		$json_pretty = json_encode($json, JSON_PRETTY_PRINT);

		echo $json_pretty;

		$avatar_url = $json['response']['players'][0]["avatar"];

		$name = $json['response']['players'][0]["personaname"];


		//crear SESSIONS
		$_SESSION['name'] = $name;
		$_SESSION['steamId'] = $steamid;
		$_SESSION['img'] = $avatar_url;

 }


	header('location: index.php');
?>
