<?php
	include 'steam.php';
	session_start();


	if(isset($_SESSION['steamId'])){
		$steamId = $_SESSION['steamId'];
	}
	else{
		exit;
	}

	//https://steamcommunity-a.akamaihd.net/economy/image/

	echo "<a href='index.php'>Volver</a>";

	$api_url = "https://steamcommunity.com/inventory/".$steamId."/730/2?l=spanish&count=5000";

  $json = json_decode(file_get_contents($api_url), true);

	$cantidad = $json["total_inventory_count"];
	$cantidad -= 1;

	$descriptions = $json["descriptions"];

	/*for ($i=0; $i < $cantidad; $i++) {

		$arma = $descriptions[$i]["name"];

		$icono = $descriptions[$i]["icon_url"];

		echo "<div> <img width='25px' height='25px' src='https://steamcommunity-a.akamaihd.net/economy/image/$icono' alt=''> $arma </div>";
	}*/

	foreach ($descriptions as $i) {
		$arma = $i["name"];

		$icono = $i["icon_url"];

		echo "<div> <img height='50px' src='https://steamcommunity-a.akamaihd.net/economy/image/$icono' alt=''> $arma </div>";
	}
 ?>
