<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<center>
<?php
	if (isset($_POST['boton'])==false){
?>
	<h2>CUENTA CARTAS ALTAS(Formulario)</h2>
</center>
<p>Indique el palo y el numero de cartas que tirara cada jugador y el numero de cartas que elegiran:</p>
<form  method="POST" action="">
	<img src="c1.svg">
	<table>
		<tr>
			<td>
				<label>Numero de cartas Total</label>
				<input type="number" min="5" max="15" name="numcartas">
			</td>
		</tr>
		<tr>
			<td>
				<label>Numero de cartas Elegidas</label>
				<input type="number" min="1" max="5" name="elegidas">
			</td>
		</tr>
		<tr>
			<td>
				<label><h4>Jugador A</h4></label>

				<label>Corazones</label>
				<input type="radio" name="jugA" value="C" checked><br>
				<label>Diamantes</label>
				<input type="radio" name="jugA" value="D"><br>
				<label>Picas</label>
				<input type="radio" name="jugA" value="P"><br>
				<label>Treboles</label>
				<input type="radio" name="jugA" value="T"><br>
			</td>
		</tr>
		<tr>
			<td>
				<label><h4>Jugador B</h4></label>
				<label>Corazones</label>
				<input type="radio" name="jugB" value="C" checked><br>
				<label>Diamantes</label>
				<input type="radio" name="jugB" value="D"><br>
				<label>Picas</label>
				<input type="radio" name="jugB" value="P"><br>
				<label>Treboles</label>
				<input type="radio" name="jugB" value="T"><br>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="boton" value="Enviar">
			</td>
		</tr>
	</table>
<?php 
	}
	else{
		$cantidad = $_POST['numcartas'];
		$elegidas = $_POST['elegidas'];
		$paloA = $_POST['jugA'];
		$paloB = $_POST['jugB'];
		if (strcasecmp($paloA, $paloB)==0) {
			echo "Las cartas no pueden ser del mismo palo";
		}
		else{
			?>
			<table border="1" style="text-align:center;">
			<?php			
			echo "<tr><td colspan=$cantidad>Cartas Jugador A</td></tr>";
			echo "<tr>";
			for ($i=0; $i < $cantidad ; $i++) { 
				$rand[$i] = rand(1,10);
				echo "<td>".$rand[$i]."</td>";
			}
			echo "</tr>";
			echo "</table>";
			echo "<br><br>";
			$e = (count($rand)-1);
			
			for ($i=0; $i < $elegidas ; $i++) { 
				$cartaA[$i] = rand(1,$rand[$e]);
				
			}
			?>
			<table border="1" style="text-align:center;">
			<?php	
			echo "<tr><td colspan=$cantidad>Cartas Jugador B</td></tr>";
			echo "<tr>";
			for ($i=0; $i < $cantidad ; $i++) { 
				$rand[$i] = rand(1,10);
				echo "<td>".$rand[$i]."</td>";
			}
			echo "</tr>";
			echo "</table>";
			echo "<br>";
			
			for ($i=0; $i < $elegidas ; $i++) { 
				$cartaB[$i] = rand(1,$rand[$e]);
				
			}

			$lengA = count($cartaA);
			$lengB = count($cartaB);

			?>
			<table border="1" style="text-align:center;">
			<?php	
			$sumaA=0;
			echo "<tr><td colspan=$lengA>Cartas Elegidas Jugador A</td></tr>";
			echo "<tr>";
			for ($i=0; $i < $lengA; $i++) { 
				switch ($cartaA[$i]) {
					case '1':
						$cartajA = "AS";
						break;
					default:
						$cartajA = $cartaA[$i];
						break;
				}
				echo "<td>".$cartajA." de $paloA </td>";
				$sumaA = $sumaA + $cartaA[$i];
			}
			echo "</tr>";
			echo "</table>";
			echo "<br>";
			$sumaB=0;
			?>
			<table border="1" style="text-align:center;">
			<?php	
			echo "<tr><td colspan=$lengB>Cartas Elegidas Jugador B</td></tr>";
			echo "<tr>";
			for ($i=0; $i < $lengB; $i++) { 
				switch ($cartaB[$i]) {
					case '1':
						$cartajB = "AS";
						break;
					case '11':
						$cartajB = "SOTA";
						break;
					case '12':
						$cartajB = "Caballo";
						break;
					case '13':
						$cartajB = "Rey";
						break;
					default:
						$cartajB = $cartaB[$i];
						break;
				}
				echo "<td>".$cartajB." de $paloB </td>";
				$sumaB = $sumaB + $cartaB[$i];
			}
			echo "</table>";
			echo "<br>";

			?>
			<table border="1" style="text-align:center;">
			<?php	
			echo "<tr>";
			echo "<td>Jugador</td>";
			echo "<td>Puntos</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>Jugador A</td>";
			echo "<td>$sumaA</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>Jugador B</td>";
			echo "<td>$sumaB</td>";
			echo "</tr></table>";
			echo "<br>";
			if ($sumaB>$sumaA) {
				echo "Ha ganado el jugador B";
			}
			elseif ($sumaA>$sumaB) {
				echo "Ha ganado el jugador A";
			}
			elseif ($sumaA==$sumaB) {
				echo "EMPATE";
			}
			else{
				echo "Error: Sin determinar";
			}
		}
	}

?>
</form>
</body>
</html>