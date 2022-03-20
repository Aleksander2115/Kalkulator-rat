<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

// 1. pobranie parametrów
function getParams(&$form){
	$form['amount'] = isset($_REQUEST ['amount']) ? $_REQUEST['amount'] : null;
	$form['interest'] = isset($_REQUEST ['interest']) ? $_REQUEST['interest'] : null;
	$form['years'] = isset($_REQUEST ['years']) ? $_REQUEST['years'] : null;
}

// 2. walidacja
function validate(&$form, &$infos, &$msgs, &$hide_intro){
	
	if ( ! (isset($form['amount']) && isset($form['interest']) && isset($form['years']) )) return false;
	
	$hide_intro = true;
	
	$infos [] = 'Przekazano parametry.';
	
	// czy przekazane
	
	if ($form['amount'] == "") $msgs [] = 'Nie podano kwoty kredytu';
	if ($form['interest'] == "") $msgs [] = 'Nie podano oprocentowania';
	if ($form['years'] == "") $msgs [] = 'Nie podano na ile lat';
	
	if (count($msgs) == 0) {
		if (! is_numeric( $form['amount'] )) $msgs [] = 'Pierwsza wartość nie jest liczbą';
		if (! is_numeric( $form['interest'] )) $msgs [] = 'Druga wartość nie jest liczbą';	
		if (! is_numeric( $form['years'] )) $msgs [] = 'Trzecia wartość nie jest liczbą';
	}
	
	if (count($msgs) > 0) return false;
	else return true;
}

// 3. wykonanie zadania
function process(&$form, &$infos, &$msgs, &$result){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
	$form['amount'] = doubleval($form['amount']);
	$form['interest'] = doubleval($form['interest']);
	$form['years'] = doubleval($form['years']);
	
	$percentage = ($form['interest']/100) * $form['amount'];
	$to_repay = $form['amount'] + $percentage;
	$result = $to_repay / ($form['years'] * 12);
}

//definicja zmiennych kontrolera
$form = null;
$infos = array ();
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($form);

if (validate($form,$infos,$messages,$hide_intro)) {
	process($form,$infos,$messages,$result);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator rat');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.html');