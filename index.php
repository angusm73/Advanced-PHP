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
	<?php
	echo "<h1>Advanced PHP</h1>";
	echo "<h3>Multidimensional Arrays</h3>";
	echo "<p>test</p>";
	?>
</body>
</html>