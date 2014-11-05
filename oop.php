<html>
<head>
	<title>Advanced PHP - Object Oriented Programming</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<h1>Advanced PHP - Object Oriented Programming</h1>
	<h4>Defining classes and creating objects</h4>
	<p>The following class has 3 public properties, one of them is static. The static variable can only be accessed via the scope resolution operator.</p>
	<?php
	class MyTestClass {
		// Property declaration
		public $variable = 'The default value';
		public $test = 'another thing';
		public static $staticVar = 'static variable';
		
		// Method declaration
		public function displayMyVariable() {
			echo $this->variable;
			var_dump($this);
			echo $this::$staticVar;
		}
	}
	$instance = new MyTestClass();
	$instance -> displayMyVariable();
	?>
	<h4>Constructors and destructors</h4>
	<?php
	date_default_timezone_set('Australia/Sydney');
	class Watch {
		public $currentTime;
		
		function __construct() {
			$this->currentTime = time();
		}
		
		function __destruct() {
			echo '<p>Destroying ' . get_class($this) . '</p>';
		}
		
		public function getTime() {
			return '<p>'.date('l jS \of F Y h:i:s A', $this->currentTime).'</p>';
		}
	}
	$myWatch = new Watch();
	echo $myWatch->getTime();
	$myWatch->__destruct();
	?>
</body>
</html>