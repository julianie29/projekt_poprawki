<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\ProductEditForm;
use app\forms\ProducerEditForm;

class ProductEditCtrl {

    private $form;
    private $producers;

    public function __construct() {
        $this->form = new ProductEditForm();
    }

    public function validateSave() {
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->code = ParamUtils::getFromRequest('code', true, 'Błędne wywołanie aplikacji');
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacji');
        $this->form->type = ParamUtils::getFromRequest('type', true, 'Błędne wywołanie aplikacji');
        $this->form->format = ParamUtils::getFromRequest('format', true, 'Błędne wywołanie aplikacji');
        $this->form->amount = ParamUtils::getFromRequest('amount', true, 'Błędne wywołanie aplikacji');
        $this->form->price = ParamUtils::getFromRequest('price', true, 'Błędne wywołanie aplikacji');
        $this->form->id_producer = ParamUtils::getFromRequest('id_producer', true, 'Błędne wywołanie aplikacji');
        if (App::getMessages()->isError())
            return false;

        if (empty(trim($this->form->code))) {
            Utils::addErrorMessage('Wprowadź kod produktu');
        }

        if (!is_numeric($this->form->code)){
            Utils::addErrorMessage('Kod produktu musi być liczbą');
        }

        if (empty(trim($this->form->name))) {
            Utils::addErrorMessage('Wprowadź nazwę produktu');
        }
        if (empty(trim($this->form->type))) {
            Utils::addErrorMessage('Wprowadź typ');
        }
        if (empty(trim($this->form->format))) {
            Utils::addErrorMessage('Wprowadź format');
        }
        if (empty(trim($this->form->amount))) {
            Utils::addErrorMessage('Wprowadź ilość');
        }
        if (empty(trim($this->form->price))) {
            Utils::addErrorMessage('Wprowadź cenę');
        }
        if (empty(trim($this->form->id_producer))) {
            Utils::addErrorMessage('Wybierz producenta');
        }

        if (App::getMessages()->isError())
            return false;


        if (is_float(trim($this->form->amount))) {
            Utils::addErrorMessage('Zły format danych! Ilość metrów kwadratowych powinna być liczbą.');
        }

        if (is_float(trim($this->form->price))) {
            Utils::addErrorMessage('Zły format danych! Cena powinna być liczbą.');
        }

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_productAdd() {
        try {
            $this->producers = App::getDB()->select("producer",
                [
                    "id",
                    "producer_name",
                    "country",
                ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        $this->generateView();
    }

    public function action_productEdit() {
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("product", "*", [
                    "id" => $this->form->id
                ]);
                $this->form->id = $record['id'];
                $this->form->code = $record['code'];
                $this->form->name = $record['name'];
                $this->form->type = $record['type'];
                $this->form->format = $record['format'];
                $this->form->amount = $record['amount'];
                $this->form->price = $record['price'];
                $this->form->id_producer = $record['id_producer'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            try {
                $this->producers = App::getDB()->select("producer",
                    [
                        "id",
                        "producer_name",
                        "country",
                    ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        $this->generateView();
    }

    public function action_productDelete() {
        if ($this->validateEdit()) {

            try {
                App::getDB()->delete("product", [
                    "id" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('productList');
    }

    public function action_productSave() {

        if ($this->validateSave()) {
            try {

                if ($this->form->id == '') {
                    $count = App::getDB()->count("product");
                    if ($count <= 30) {
                        App::getDB()->insert("product", [
                            "id" => $this->form->id,
                            "code" => $this->form->code,
                            "name" => $this->form->name,
                            "type" => $this->form->type,
                            "format" => $this->form->format,
                            "amount" => $this->form->amount,
                            "price" => $this->form->price,
                            "id_producer" => $this->form->id_producer,
                        ]);
                    } else {
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateView();
                        exit();
                    }
                } else {
                    App::getDB()->update("product", [
                        "code" => $this->form->code,
                        "name" => $this->form->name,
                        "type" => $this->form->type,
                        "format" => $this->form->format,
                        "amount" => $this->form->amount,
                        "price" => $this->form->price,
                        "id_producer" => $this->form->id_producer,
                            ], [
                        "id" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            App::getRouter()->forwardTo('productList');
        } else {
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->assign('producer', $this->producers);
        App::getSmarty()->display('ProductEdit.tpl');
    }

}
