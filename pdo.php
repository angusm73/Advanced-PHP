<html>
<head>
	<title>Advanced PHP - PHP Data Objects</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<h1>Advanced PHP - PHP Data Objects</h1>
	<h4>Available Drivers</h4>
	<?=var_dump(PDO::getAvailableDrivers());?>
	<h4>Connecting to a database</h4>
	<code>$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);</code><br />
	<p>Connection can be closed by setting the Database Handler to null, eg:</p>
	<code>$DHB = null;</code><br />
	<?php
	$host	= "localhost";
	$dbname	= "advancedPHP";
	$user	= "root";
	$pass	= "";
	try {
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	} catch (PDOException $e) {
		echo $e->getMessage();	
	}
	?>
</body>
</html>