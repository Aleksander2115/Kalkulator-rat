<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;
use PDOException;

class ResultListCtrl {

  private $form;
  private $records;

  public function __construct(){
  //stworzenie potrzebnych obiektów
  $this->form = new CalcForm();
  $this->result = new CalcResult();
}

  public function action_resultDelete(){

    $this->form->id = getFromRequest('id');

    try{
    // 2. usunięcie rekordu
        getDB()->delete("kalkulacja",[
          "idkalkulacja" => $this->form->id
        ]);
        getMessages()->addInfo('Pomyślnie usunięto rekord');
    } catch (PDOException $e){
        getMessages()->addError('Wystąpił błąd podczas usuwania rekordu');
        if (getConf()->debug) getMessages()->addError($e->getMessage());
    }

// 3. Przekierowanie na stronę listy osób
    forwardTo('resultList');
  }

  public function action_resultList(){

    $this->form->id = getFromRequest('id');

    try{
      $this->records = getDB()->select("kalkulacja", [
      "idkalkulacja",
      "Kwota",
      "Oprocentowanie",
      "Lata",
      "Rata",
      ]);
    } catch (PDOException $e){
        getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
        if (getConf()->debug) getMessages()->addError($e->getMessage());
    }

    getSmarty()->assign('results',$this->records);  // lista rekordów z bazy danych
    getSmarty()->display('ResultView.tpl');
  }


}
