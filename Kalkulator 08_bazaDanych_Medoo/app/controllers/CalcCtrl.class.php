<?php
// W skrypcie definicji kontrolera nie trzeba dołączać już niczego.
// Kontroler wskazuje tylko za pomocą 'use' te klasy z których jawnie korzysta
// (gdy korzysta niejawnie to nie musi - np używa obiektu zwracanego przez funkcję)

// Zarejestrowany autoloader klas załaduje odpowiedni plik automatycznie w momencie, gdy skrypt będzie go chciał użyć.
// Jeśli nie wskaże się klasy za pomocą 'use', to PHP będzie zakładać, iż klasa znajduje się w bieżącej
// przestrzeni nazw - tutaj jest to przestrzeń 'app\controllers'.

// Przypominam, że tu również są dostępne globalne funkcje pomocnicze - o to nam właściwie chodziło

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;
use PDOException;

/** Kontroler kalkulatora
 * @author Aleksander Grzesiak
 *
 */
class CalcCtrl {

	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku

	/**
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}

	/**
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->amount = getFromRequest('amount');
		$this->form->interest = getFromRequest('interest');
		$this->form->years = getFromRequest('years');
		$this->form->id = getFromRequest('id');
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
				getMessages()->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->interest == "") {
				getMessages()->addError('Nie podano oprocentowania');
		}
		if ($this->form->years == "") {
				getMessages()->addError('Nie podano na ile lat');
		}

		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {

			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->amount )) {
				getMessages()->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}

			if (! is_numeric ( $this->form->interest )) {
				getMessages()->addError('Druga wartość nie jest liczbą całkowitą');
			}

			if (! is_numeric ( $this->form->years )) {
				getMessages()->addError('Trzecia wartość nie jest liczbą całkowitą');
			}
		}

		return ! getMessages()->isError();
	}

	/**
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function action_calcCompute(){

		$this->getparams();

		if ($this->validate()) {

			//konwersja parametrów na int
			$this->form->amount = doubleval($this->form->amount);
			$this->form->interest = doubleval($this->form->interest);
			$this->form->years = doubleval($this->form->years);
			getMessages()->addInfo('Parametry poprawne.');

			//wykonanie operacji
			if (inRole('admin') || inRole('user')){
				$percentage = ($this->form->interest/100) * $this->form->amount;
				$to_repay = $this->form->amount + $percentage;
				$this->result->result = $to_repay / ($this->form->years * 12);
			} else {
					getMessages()->addError('Tylko administrator i użytkownik może dokonać obliczeń');
			}

			getMessages()->addInfo('Wykonano obliczenia.');
		}

		$this->generateView();

		try {
			//2.1 Nowy rekord
			if ($this->form->id == '') {

					getDB()->insert("kalkulacja", [
						"Kwota" => $this->form->amount,
						"Oprocentowanie" => $this->form->interest,
						"Lata" => $this->form->years,
						"Rata" => $this->result->result,
					]);
			}

			getMessages()->addInfo('Pomyślnie zapisano rekord');

		} catch (PDOException $e){
			getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
			if (getConf()->debug) getMessages()->addError($e->getMessage());
		}

	}

	public function action_calcShow(){
		getMessages()->addInfo('Witaj w kalkulatorze');
		$this->generateView();
	}

	/**
	 * Wygenerowanie widoku
	 */
	 public function generateView(){

 		getSmarty()->assign('form',$this->form);
 		getSmarty()->assign('res',$this->result);

 		getSmarty()->display('CalcView.html');
 	}
}
