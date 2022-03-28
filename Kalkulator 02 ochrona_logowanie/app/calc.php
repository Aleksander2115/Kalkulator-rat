<?php
require_once dirname(__FILE__).'/../config.php';
include _ROOT_PATH.'/app/security/check.php';

// 1. pobranie parametrów
function getParams(&$amount, &$interest, &$years){
	$amount = isset($_REQUEST ['amount']) ? $_REQUEST['amount'] : null;
	$interest = isset($_REQUEST ['interest']) ? $_REQUEST['interest'] : null;
	$years = isset($_REQUEST ['years']) ? $_REQUEST['years'] : null;
}
// 2. walidacja
function validate(&$amount, &$interest, &$years, &$messages){
	
	if ( ! (isset($amount) && isset($interest) && isset($years))){
		return false;
	}
	
	
	// czy przekazane
	if ($amount == "") {
		$messages [] = 'Nie podano kwoty kredytu';
	}

	if ($interest == "") {
		$messages [] = 'Nie podano oprocentowania';
	}

	if ($years == "") {
		$messages [] = 'Nie podano ilości miesięcy';
	}
	
	
	if (count ($messages) != 0) return false;
		
	
	if (! is_numeric($amount)) {
		$messages [] = 'Kwota nie jest liczbą całkowitą';
	}
	
	if (! is_numeric($interest)) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
	}
	
	if (! is_numeric($years)) {
		$messages [] = 'Ilość lat nie jest liczbą całkowitą';
	}
	
	if(count ($messages) !=0) return false;
	else return true;
}

// 3. wykonanie zadania
function process(&$amount, &$interest, &$years, &$messages, &$percentage, &$to_repay, &$result){
	global $role;
	
	$amount = doubleval($amount);
	$interest = doubleval($interest);
	$years = doubleval($years);
	
	if ($role == 'admin'){
		$percentage = ($interest/100) * $amount;
		$to_repay = $amount + $percentage;
		$result = $to_repay / ($years * 12);
	}
	
	if ($role == 'user'){
		$messages [] = 'Użytkownik nie może obliczyć raty kredytu';
	}
}

//definicja zmiennych kontrolera
$amount = null;
$interest = null;
$years = null;
$percentage = null;
$to_repay = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($amount, $interest, $years);

if (validate($amount, $interest, $years, $messages)) {
	process($amount, $interest, $years, $messages, $percentage, $to_repay, $result);
}
// 4.Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';