<?php include 'steam.php'; ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>STEAM LOGIN</title>
	</head>
	<body>
		<h1>STEAM LOGIN</h1>


		<?php
			$url = SteamLogin::genUrl('http://agssoft.ar/DOS/steam/');
		?>

		<a href="<?php echo $url; ?>">Login with Steam</a>

		 <?php
			$response = SteamLogin::validate();

			if( empty( $response ) ) {
				echo 'The Steam Login request has now expired, please try again.';
			}
			else {
				$api_key = "C0406705A4C1D22E11103C3B2169E85F";
		    $steamid = $response;

		    $api_url = "https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$api_key&steamids=$steamid";

			 	 $json = json_decode(file_get_contents($api_url), true);

			 	 $avatar_url = $json['response']['players'][0]["avatar"];

				 $name = $json['response']['players'][0]["personaname"];

				 //$json_pretty = json_encode($avatar, JSON_PRETTY_PRINT);

				 echo "<span>Hola $name</span>";
			   echo "<img src='$avatar_url' alt=''>";
			}

		?>
	</body>
</html>
