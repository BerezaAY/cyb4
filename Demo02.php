<html>

	<head>
		<title>Demo PHP</title>
		<meta charset="utf-8" /> 
	</head>
	
	
	<body>
		<a href="index1.html">Домашняя страница</a>
		<h1>Hello from PHP!</h1>
		<?php
			$x=2;
			$y=2;
			$z=$x+$y;
			echo "<h2> Result: $z</h2>";
			
			date_default_timezone_set("Europe/Moscow");
			$now=date("H:i:s"); 
			echo "<h1>Page open at $now</h1>";
		?>
		
		<p>Введите число, и мы его удвоим:
			<form action="doubler.php">
				<input type="text" name="data"/>
				<button>Отправить данные на удвоение</button>
			</form>
		</p>
		
		
	</body>





</html>