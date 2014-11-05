<html>
<head>
	<style>
		body {
			background: #333 url("http://i.imgur.com/tlSetfG.jpg");
			font-family: Arial;
			font-size: 14px;
			color: #fff;
			padding: 20px;
		}
		h2:after, 
		h3:after, 
		h4:after {
			position: absolute;
			content: "";
			left: 0;
			top: 0;
			bottom: 0;
			width: 5px;
			border-radius: 2px;
			box-shadow: 
				inset 0 1px 1px rgba(0,0,0,0.5), 
				0 1px 1px rgba(255,255,255,0.3);
		}

		h2:after { background: #0AF; }
		h3:after { background: #3BF; }
		h4:after { background: #f55; }

		h1 {
			font-size: 36px;
			line-height: 40px;
			margin: 1em 0 .6em 0;
			font-weight: normal;
			color: white;
			font-family: 'Hammersmith One', sans-serif;
			text-shadow: 0 -1px 0 rgba(0,0,0,0.4);
			position: relative;
			color: #6Cf;
		}

		h2 {
			margin: 1em 0 .6em 0;
			padding: 0 0 0 20px;
			font-weight: normal;
			color: white;
			font-family: 'Hammersmith One', sans-serif;
			text-shadow: 0 -1px 0 rgba(0,0,0,0.4);
			position: relative;
			font-size: 30px;
			line-height: 40px;
		}

		h3 {
			margin: 1em 0 .6em 0;
			padding: 0 0 0 20px;
			font-weight: normal;
			color: white;
			font-family: 'Hammersmith One', sans-serif;
			text-shadow: 0 -1px 0 rgba(0,0,0,0.4);
			position: relative;
			font-size: 24px;
			line-height: 40px;
			font-family: 'Questrial', sans-serif;
		}

		h4 {
			margin: 1em 0 .6em 0;
			padding: 0 0 0 20px;
			font-weight: normal;
			color: white;
			font-family: 'Hammersmith One', sans-serif;
			text-shadow: 0 -1px 0 rgba(0,0,0,0.4);
			position: relative;
			font-size: 18px;
			line-height: 20px;
			font-family: 'Questrial', sans-serif;
		}
		
		.note:before {
			content: "NOTE:";
			color: #000;
			background: rgb(199, 237, 253);
			border-radius: 4px 0px 0px 4px;
			padding: 5px;
			margin-left: -10px;
			margin-right: 6px;
			font-weight: bolder;
			box-shadow: 
				inset 0 1px 1px rgba(0,0,0,0.5), 
				0 1px 1px rgba(255,255,255,0.3);
		}
		.note {
			background: rgb(255, 232, 232);
			border-radius: 0px 4px 4px 0px;
			padding: 4px;
			color: #000;
			width: auto;
		}
		
		code {padding-left: 30px;}
	</style>
</head>
<body>
	<h1>Advanced PHP</h1>
	
	<div style="float: left; width: 100%;">
		<h3>Multidimensional Arrays</h3>
		<h4>Key (Name, Score, Price)</h4>
		<div style='float: left;'>
		<?php
		$myArray = array(
			array("GTX 670", 5380, 399),
			array("GTX 680", 5715, 490),
			array("GTX 770", 6172, 269),
			array("GTX 780", 8040, 359),
			array("GTX 970", 8839, 327),
			array("GTX 980", 9767, 549)
		);
		for ($row = 0; $row < count($myArray); $row++) {
			echo "Row number: $row<ul>";
			for ($col = 0; $col < count($myArray[$row]); $col++) {
				echo "<li>" . $myArray[$row][$col] . "</li>";	
			}
			echo "</ul>";
		}
		?>
		</div>
		<div style='float: right;'>
			<?=var_dump($myArray);?>
		</div>
	</div>
	
	<div style="float: left; width: 100%;">
		<h3>Advanced Function Definitions</h3>
		<h4>Default Parameter Values</h4>
		<code>function newCar($name, $age, $type="sedan") { ... }</code><br />
		<p class="note">Parameters with predefined values must be placed after ones without.</p>
		<h4>Variable Length Argument List</h4>
		<code>function addNames() { ... }</code><br /><br />
		<code>addNames("Name1", "Name2", "AnotherName", "FinalName");</code><br />
		<?php
		function addNames()
		{
			$argCount = func_num_args();
			echo "<p>func_num_args(): $argCount</p>";
			echo "<p>func_get_args(): </p>";
			var_dump(func_get_args());
		}
		addNames("Name1", "Name2", "AnotherName", "FinalName");
		?>
		<h4>Variable Functions</h4>
		<code>function myFunc($a) { return $a; }</code><br />
		<code>$indirect = "myFunc";</code><br />
		<code>$y = $indirect("test");</code><br />
		<?php
		function myFunc($a) {
			return $a;
		}
		$indirect = "myFunc";
		$y = $indirect("test");
		echo "<p>\$y returns: $y</p>";
		?>
		<h4>Anonymous Functions (Lambda Functions)</h4>
		<code>$multiply = create_function('$a, $b', 'return $a*$b;');</code><br />
		<code>$y = $multiply(4, 7);</code><br />
		<?php
		$multiply = create_function('$a, $b', 'return $a*$b;');
		$y = $multiply(4, 7);
		echo "<p>\$y returns: $y</p>";
		?>
	</div>
	
	<div style="float: left; width: 100%;">
		<h3>Heredoc Syntax</h3>
		<?php
		echo <<<EOD
Example of string
spanning multiple lines
using heredoc syntax.
EOD;
		echo "<br />";
		$name = "John";
		echo <<<EOD
My name is $name.
That was a variable.
EOD;
		?>
		<br /><br />
		<code>$id = 10;</code><br />
		<code>$sql = &lt;&lt;&lt;SQL</code><br />
		<code>SELECT * FROM table WHERE id = $id;</code><br />
		<code>SQL;</code><br />
		<code>mysql_query($sql);</code><br />
		<p class="note">Useful for SQL, no need to escape quotes or double quotes.</p>
	</div>
	
	<div style="float: left; width: 100%;">
		<h3>printf() and sprintf()</h3>
		<h4>Type specifiers</h4>
		<ul>
			<li>d: Displays argument as a decimal number</li>
			<li>b: Displays an integer as a binary number</li>
			<li>c: Displays an integer as ASCII equivalent</li>
			<li>f: Displays an integer as a floating-point number (double)</li>
			<li>o: Displays an integer as and octal number (base 8)</li>
			<li>s: Displays argument as a string</li>
			<li>x: Displays an integer as a lowercase hexadecimal number</li>
			<li>X: Displays an integer as an uppercase hexadecimal number</li>
			<p>Example:</p>
			<code>printf("%d", 482);</code><br /><br />
			<?php
			$i = 482;
			printf("Decimal: %d<br />", $i);
			printf("Binary: %b<br />", $i);
			printf("ASCII: %c<br />", $i);
			printf("Floating-point: %f<br />", $i);
			printf("Octal: %o<br />", $i);
			printf("String: %s<br />", $i);
			printf("Lowercase hex: %x<br />", $i);
			printf("Uppercase hex: %X<br />", $i);
			?>
		</ul>
		<h4>Paddng specifier</h4>
		<?php
		$value = sprintf("%04d", 75);
		$altValue = sprintf("%'x4d", 75);
		echo "<code>printf(\"%04d\", 75)</code> prints: $value";
		echo "<br />or<br />";
		echo "<code>printf(\"%'x4d\", 75)</code> prints: $altValue";
		?>
		<h4>Precision Specifier</h4>
		<?php
		$precisionFloat = sprintf("%.4f", 5.33333333);
		echo "<code>printf(\"%.4f\", 5.33333333)</code> prints: $precisionFloat";
		?>
		<p class="note">printf() echo's the formatted string, sprintf() returns the formatted string.</p>
	</div>
</body>
</html>