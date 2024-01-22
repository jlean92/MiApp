<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
	$num1 = 7;
	$contar = 0;
for ($i=1; $i <= $num1 $ ; $i++) { 
	if ($num1 % $i == 0) {
		$contar++;
	}
}

if ($contar == 2) {
	echo "$num1 es primo";
}

?>
</body>
</html>