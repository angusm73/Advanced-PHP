<html>
<head>
	<title>Advanced PHP - PHP Data Objects</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<h1>Advanced PHP - PHP Data Objects</h1>
	<h4>Available Drivers</h4>
	<pre>PDO::getAvailableDrivers()</pre>
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
	<h4>PDO Exceptions</h4>
	<p>There are 3 error modes, these can be changed by:</p>
	<code>$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT );</code><br />
	<code>$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );</code><br />
	<code>$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );</code><br />
	<p>I will be using <samp>PDO::ERRMODE_EXCEPTION</samp> to view all the errrors</p>
	<?php
	if ($DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION )) {
		echo "<p>Succefully set <samp>PDO::ATTR_ERRMODE</samp> to <samp>PDO::ERRMODE_EXCEPTION</samp></p>";
	}
	?>
	<h4>Triggering an exception</h4>
	<code>$DBH->prepare('DELECT * FROM table');</code><br />
	<?php
	try {
		$DBH->prepare('DELECT * FROM table');
		echo "<p>This should be causing an error, but isn't.</p>";
	} catch (PDOException $e) {
		echo $e->getMessage();
		file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
	}
	?>
	<h4>INSERT and UPDATE into a database</h4>
	<p>This step has to go through at least 2 operations (Prepare and Execute), binding is optional.</p>
	<b style="font-size: 16px; color: #3a3;">PREPARE -> [BIND] -> EXECUTE</b>
	<p>First we must declare a statement handler (STH)</p>
	
	<code>// Unnamed paramters (can be bound using ID, starting from 1)</code><br />
	<code>$STH = $DBH->prepare('INSERT INTO people(name, age, gender) VALUES (?, ?, ?)');</code><br /><br />
	
	<code>// Named paramters</code><br />
	<code>$STH = $DBH->prepare('INSERT INTO people(name, age, gender) VALUES (:name, :age, :gender)');</code><br /><br />
	<code>$STH->bindParam(':name', $name);</code><br />
	<code>$STH->bindParam(':age', $age);</code><br />
	<code>$STH->bindParam(':gender', $gender);</code><br /><br />
	<code>$STH->execute();</code><br />
	<p>The advantage to this is that it only has to be prepared once, eg:</p>
	<code>$name = 'Angus';</code><br />
	<code>$age = 17;</code><br />
	<code>$gender = 'Male';</code><br />
	<code>$STH->execute();</code><br /><br />
	<code>$name = 'Hayley';</code><br />
	<code>$age = 32;</code><br />
	<code>$gender = 'Female';</code><br />
	<code>$STH->execute();</code><br />
	<p>An alternative to this is passing in the data via an array. EG:</p>
	<code>$data = array('Ben', 45, 'Male');</code><br />
	<code>$STH = $DBH->prepare('INSERT INTO people (name, age, gender) VALUES(?, ?, ?)');</code><br />
	<code>$STH->execute($data);</code><br />
	<p>Or with named parameters:</p>
	<code>$data = array("name" => "Linda", "age" => 28, "gender" => "Female");</code><br />
	<code>$STH = $DBH->prepare('INSERT INTO people (name, age, gender) VALUES (:name, :age, :gender)');</code><br />
	<code>$STH->execute($data);</code><br />
	<?php
	$data = array("name" => "Angus", "age" => 17, "gender" => "Male");
	if ($x = $DBH->query('SELECT * FROM people WHERE name = "Angus"')) {
		if ($x->fetchColumn() > 0) {
			echo "<p>There is already a person in the database with the name 'Angus'.</p>";
		} else {
			echo "<p>There is no-one in the db with the name 'Angus'. Creating one now...</p>";
			$STH = $DBH->prepare('INSERT INTO people (name, age, gender) VALUES (:name, :age, :gender)');
			$STH->execute($data);
		}
	}
	?>
	<h4>SELECT data</h4>
	<p>There are different modes to fetch data, here they are:</p>
	<ul>
		<?php
		$STH = $DBH->query('SELECT * FROM people');
		?>
		<li>PDO::FETCH_ASSOC</li><?php $STH = $DBH->query('SELECT * FROM people'); $STH->setFetchMode(PDO::FETCH_ASSOC); var_dump($STH->fetch()); ?>
		<li>PDO::FETCH_NUM</li><?php $STH = $DBH->query('SELECT * FROM people'); $STH->setFetchMode(PDO::FETCH_NUM); var_dump($STH->fetch()); ?>
		<li>PDO::FETCH_BOTH (default)</li><?php $STH = $DBH->query('SELECT * FROM people'); $STH->setFetchMode(PDO::FETCH_BOTH); var_dump($STH->fetch()); ?>
		<li>PDO::FETCH_LAZY</li><?php $STH = $DBH->query('SELECT * FROM people'); $STH->setFetchMode(PDO::FETCH_LAZY); var_dump($STH->fetch()); ?>
		<li>PDO::FETCH_OBJ</li><?php $STH = $DBH->query('SELECT * FROM people'); $STH->setFetchMode(PDO::FETCH_OBJ); var_dump($STH->fetch()); ?>
		<li>PDO::FETCH_CLASS</li>
		<li>PDO::FETCH_INTO</li>
	</ul>
</body>
</html>