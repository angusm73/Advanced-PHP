<html>
<head>
	<style>
		body {
			background: #333 url("http://tympanus.net/Tutorials/HeadingSets/images/black_denim.jpg");
			font-family: Arial;
			font-size: ;
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
		h4:after { background: #6Cf; }

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
	</style>
</head>
<body>
	<h1>Advanced PHP</h1>
	
	<div style="float: left; width: 100%;">
		<h3>Multidimensional Arrays</h3>
		<p>Key (Name, Score, Price)</p>
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
	</div>
</body>
</html>