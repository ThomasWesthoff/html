<!DOCTYPE html>
<html lang="de">
<html>
	<head>
		<title>Widerstandsberechnung</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>
	<body>
	<?	$farbname=array('schwarz','braun','rot','orange','gelb','gr&uuml;n','blau','lila','grau','wei&szlig;'); 
		$farbnummer=array('#000000','#996633','#FF0000','#FFA500','#FFFF00','#00FF00','#0000FF','#9900CC','#808080','#FFFFFF');
		$vordergrund=array('#FFFFFF','#FFFFFF','#000000','#000000','#000000','#000000','#FFFFFF','#FFFFFF','#000000','#000000');
		$toleranz=array('-','+- 1%','+- 2%','-','-','+- 0,5%','+- 0,25%','+- 0,1%','+- 0,05%','-');
		$ring=array(0,0,0,0);
		$wert="";
		if (isset($_POST["ring"])) {
			$ring=$_POST["ring"];}	?>
		<div class="container-fluid">
			<form name="eingabe" action="farbcode.php" method="post">
				<h1>Widerstandsberechnung</h1>
				<div class="row">
					<?	for ($i=1;$i<=4;$i++) {
							echo '<div class="span3" style="background-color:'.$farbnummer[$ring[$i-1]].';color:'.$vordergrund[$ring[$i-1]].'"><h2>Ring '.$i.'</h2></div>'; }
						$wert=($ring[0].$ring[1])*pow(10,$ring[2]);
						$wert=$wert." &Omega; ".$toleranz[$ring[3]];?>
				</div>
				<div class="row">
					<?	for($i=1;$i<=4;$i++) { 
							echo '<div class="span3"><select name="ring[]" onChange="javascript:document.eingabe.submit()">';
							for ($j=0;$j<=9;$j++) {
								($ring[$i-1]==$j) ? $sel="selected" : $sel="";
								echo '<option '.$sel.' style="background-color:'.$farbnummer[$j].';color:'.$vordergrund[$j].'" value="'.$j.'">'.$farbname[$j].'</option>'; } 
							echo '</select></div>';
						}?>	
						</div>
				<? echo '<h2>Widerstandswert: '.$wert.'</h2>'; ?>
			</form>
		</div>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>