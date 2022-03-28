<?php
//Tu już nie ładujemy konfiguracji - sam widok nie będzie już punktem wejścia do aplikacji.
//Wszystkie żądania idą do kontrolera, a kontroler wywołuje skrypt widoku.
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset = "utf-8" />
	<title>Kalkulator rat</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_ochrona.php" class="pure-button">kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post" class="pure-form">
	<label for="id_amount">Kwota kredytu: </label>
	<input id="id_amount" type="text" name="amount" value="<?php out($amount); ?>" class = "pure-input-rounded" style="background-color: Black; color: Red" /><br />
	<label for="id_interest">Oprocentowanie: </label>
	<input id="id_interest" type="text" name="interest" value="<?php out($interest); ?>" class = "pure-input-rounded" style="background-color: Black; color: Red" /><br />
	<label id="id_years">Ile lat: </label>
	<input id="id_years" type="text" name="years" value="<?php out($years); ?>" class = "pure-input-rounded" style="background-color: Black; color: Red" /><br />
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary" style="background-color: Black; color: Red" />
</form>

<?php
// Wyświetlanie listy błędów, jeśli są
if(isset($messages)){
	if(count ($messages) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: Black; color: Red; width:300px;">';
		foreach ($messages as $key => $msg){
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)) { ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #f0f; width:300px;">
<?php echo 'Wynik: '.$result; ?>
</div>
<?php } ?>

</div>

</body>
</html>