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
	$cara = rand(1, 6);
	echo $cara;
}while ($cara!=6);

$cara = rand(1, 6);
echo $cara;
while ($cara!=6){
	$cara = rand(1, 6);
	echo $cara;
}


?>
</body>
</html>