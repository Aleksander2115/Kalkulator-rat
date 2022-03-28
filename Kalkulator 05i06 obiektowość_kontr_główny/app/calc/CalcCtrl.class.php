<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/calc/CalcForm.class.php';
require_once $conf->root_path.'/app/calc/CalcResult.class.php';

/** Kontroler kalkulatora
 * @author Aleksander Grzesiak
 *
 */
class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku

	/**
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}

	/**
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->amount = isset($_REQUEST ['amount']) ? $_REQUEST ['amount'] : null;
		$this->form->interest = isset($_REQUEST ['interest']) ? $_REQUEST ['interest'] : null;
		$this->form->years = isset($_REQUEST ['years']) ? $_REQUEST ['years'] : null;
	}

	/**
	 * Walidacja parametrów
	 * return true jeśli brak błedów, false w przeciwnym wypadku
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->amount ) && isset ( $this->form->interest ) && isset ( $this->form->years ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		}

		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->amount == "") {
				$this->msgs->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->interest == "") {
				$this->msgs->addError('Nie podano oprocentowania');
		}
		if ($this->form->years == "") {
				$this->msgs->addError('Nie podano na ile lat');
		}

		// nie ma sensu walidować dalej gdy brak parametrów
		if (! $this->msgs->isError()) {

			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->amount )) {
				$this->msgs->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}

			if (! is_numeric ( $this->form->interest )) {
				$this->msgs->addError('Druga wartość nie jest liczbą całkowitą');
			}

			if (! is_numeric ( $this->form->years )) {
				$this->msgs->addError('Trzecia wartość nie jest liczbą całkowitą');
			}
		}

		return ! $this->msgs->isError();
	}

	/**
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function process(){

		$this->getparams();

		if ($this->validate()) {

			//konwersja parametrów na int
			$this->form->amount = doubleval($this->form->amount);
			$this->form->interest = doubleval($this->form->interest);
			$this->form->years = doubleval($this->form->years);
			$this->msgs->addInfo('Parametry poprawne.');

			//wykonanie operacji
			$percentage = ($this->form->interest/100) * $this->form->amount;
			$to_repay = $this->form->amount + $percentage;
			$this->result->result = $to_repay / ($this->form->years * 12);

			$this->msgs->addInfo('Wykonano obliczenia.');
		}

		$this->generateView();
	}


	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		global $conf;

		$smarty = new Smarty();
		$smarty->assign('conf',$conf);

		$smarty->assign('page_title','Kalkulator rat');
		$smarty->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC.');
		$smarty->assign('page_header','Obiekty w PHP');

		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);

		$smarty->display($conf->root_path.'/app/calc/CalcView.html');
	}
}
