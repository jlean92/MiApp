<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 
	do{
	$cara=rand(1,6);
	echo "<br> Ha salido la cara del dado $cara";
	}while($cara!=6);
	echo "<br>Fin programa<br><br>";

	$cara=rand(1,6);
	echo "<br> Ha salido la cara del dado $cara";
	
	while($cara!=6){
		$cara=rand(1,6);
		echo "<br> Ha salido la cara del dado $cara";
	
	}


?>
</body>
</html>