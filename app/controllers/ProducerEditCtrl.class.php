<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\ProducerEditForm;

class ProducerEditCtrl {

    private $form;

    public function __construct() {
        $this->form = new ProducerEditForm();
    }

    public function validateSave() {
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->producer_name = ParamUtils::getFromRequest('producer_name', true, 'Błędne wywołanie aplikacji');
        $this->form->country = ParamUtils::getFromRequest('country', true, 'Błędne wywołanie aplikacji');
        if (App::getMessages()->isError())
            return false;

        if (empty(trim($this->form->producer_name))) {
            Utils::addErrorMessage('Wprowadź kod nazwę producenta');
        }
        if (empty(trim($this->form->country))) {
            Utils::addErrorMessage('Wprowadź kraj producenta');
        }


        if (App::getMessages()->isError())
            return false;


        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_producerAdd() {
        $this->generateView();
    }

    public function action_producerEdit() {
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("producer", "*", [
                    "id" => $this->form->id
                ]);
                $this->form->id = $record['id'];
                $this->form->producer_name = $record['producer_name'];
                $this->form->country = $record['country'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        $this->generateView();
    }

    public function action_producerDelete() {
        if ($this->validateEdit()) {

            try {
                App::getDB()->delete("producer", [
                    "id" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('producerList');
    }

    public function action_producerSave() {

        if ($this->validateSave()) {
            try {

                if ($this->form->id == '') {
                    $count = App::getDB()->count("producer");
                    if ($count <= 30) {
                        App::getDB()->insert("producer", [
                            "id" => $this->form->id,
                            "producer_name" => $this->form->producer_name,
                            "country" => $this->form->country,
                        ]);
                    } else {
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateView();
                        exit();
                    }
                } else {
                    App::getDB()->update("producer", [
                        "producer_name" => $this->form->producer_name,
                        "country" => $this->form->country,
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

            App::getRouter()->forwardTo('producerList');
        } else {
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->assign('producer', $this->producers);
        App::getSmarty()->display('ProducerEdit.tpl');
    }

}
