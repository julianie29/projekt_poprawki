<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;

class LoginCtrl {

    private $form;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        if (!isset($this->form->login))
            return false;

        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        if (App::getMessages()->isError())
            return false;

        try {
            $record = App::getDB()->select("user",
                [
                    "role",
                ],[
                 "login" => $this->form->login,
                 "password" => $this->form->pass,
                ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas logowania');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        foreach ($record as $r){
                $role = $r["role"];
            }

        if (trim(!empty($role))) {
            RoleUtils::addRole($role);
            RoleUtils::addUser($this->form->login, $role);
        } else {
            Utils::addErrorMessage('Niepoprawny login lub hasło');
        }


        return !App::getMessages()->isError();
    }

    public function userAdd() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->repeated_pass = ParamUtils::getFromRequest('repeatedpass');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        if (!isset($this->form->login))
            return false;

        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }
        if (empty($this->form->repeated_pass)) {
            Utils::addErrorMessage('Nie powtórzono hasła');
        }

        if ((strcmp($this->form->pass, $this->form->repeated_pass) !== 0)){
            Utils::addErrorMessage('Wpisane hasła są różne');
        }

        try {
            $record = App::getDB()->select("user",
                [
                    "role",
                ],[
                    "login" => $this->form->login
                ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas tworzenia konta');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        if (count($record) > 0) {
            Utils::addErrorMessage('Użytkownik o podanym loginie już istnieje');
        }

        if (App::getMessages()->isError())
            return false;

        try {
            $record = App::getDB()->insert("user", [
                "login" => $this->form->login,
                "password" => $this->form->pass,
                "role" => "user",
            ]);
            Utils::addInfoMessage('Pomyślnie utworzono konto');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas tworzenia konta');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        if (!App::getMessages()->isError()){
            App::getRouter()->forwardTo('loginShow');
        }

        return !App::getMessages()->isError();
    }

    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login() {
        if ($this->validate()) {
            Utils::addErrorMessage('Poprawnie zalogowano do systemu');
            App::getRouter()->redirectTo("productList");
        } else {
            $this->generateView();
        }
    }

    public function action_logout() {
        session_destroy();
        App::getRouter()->redirectTo('productList');
    }


    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('LoginView.tpl');
    }

    public function action_newUser() {
        $this->generateNewUserView();
    }

    public function generateNewUserView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('AddUserView.tpl');
    }

    public function action_userAdd() {
        if (!$this->userAdd()) {
            $this->generateNewUserView();
        }
    }

    public function userDelete() {
        if ($_SESSION['_amelia_role'] != "admin"){
            $this->form->login = $_SESSION['_amelia_login'];
            try {
                App::getDB()->delete("user", [
                    "login" => $this->form->login
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto konto');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        else{
            Utils::addErrorMessage('Nie można usunąć konta administratora');
        }

        App::getRouter()->forwardTo('loginShow');

        return !App::getMessages()->isError();
    }

    public function action_userDelete() {
        session_destroy();
        $this->userDelete();
    }
}
