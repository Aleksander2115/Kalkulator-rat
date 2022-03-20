<?php
require_once dirname(__FILE__).'/../config.php';

// 1. pobranie parametrów

$amount = $_REQUEST ['amount'];
$interest = $_REQUEST ['interest'];
$years = $_REQUEST ['years'];

// 2. walidacja

// czy przekazane
if (! (isset($amount) && isset($interest) && isset($years))) {
	$messages [] = 'Błędne wywołanie. Brak jednej z danych.';
}

if ($amount == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}

if ($interest == "") {
	$messages [] = 'Nie podano oprocentowania';
}

if ($years == "") {
	$messages [] = 'Nie podano ilości miesięcy';
}

if (empty($messages)) {
	
	if (! is_numeric($amount)) {
		$messages [] = 'Kwota nie jest liczbą całkowitą';
	}
	
	if (! is_numeric($interest)) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
	}
	
	if (! is_numeric($years)) {
		$messages [] = 'Ilość miesięcy nie jest liczbą całkowitą';
	}
}

// 3. wykonanie zadania

if (empty($messages)) {
	
	$amount = doubleval($amount);
	$interest = doubleval($interest);
	$years = doubleval($years);
	
	$percentage = ($interest/100) * $amount;
	$to_repay = $amount + $percentage;
	$result = $to_repay / ($years * 12);
}

// 4.Wywołanie widoku z przekazaniem zmiennych

include 'calc_view.php';