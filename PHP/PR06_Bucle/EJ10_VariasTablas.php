<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<center>
<h2>10 Tablas aleatorias</h2>
<table cellspacing="20" style="text-align: center; " border="1" >
	<?php
		
		for ($i=0; $i < 10; $i++) {
				echo "</tr>";
				echo "<tr>";
			$aleatorio = rand(1, 50);
			for ($e=0; $e < 10; $e++) { 
				$resultado = $aleatorio*$e ;
				echo "<td>$e * $aleatorio = $resultado </td>";
			}
		}
	?>
</table>
</center>
</body>
</html>