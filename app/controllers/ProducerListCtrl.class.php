<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;

class ProducerListCtrl {

    private $records;

    public function action_producerList() {

        try {
            $this->records = App::getDB()->select("producer",
                [
                "id",
                "producer_name",
                "country",
                 ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }


        App::getSmarty()->assign('producer', $this->records);
        App::getSmarty()->display('ProducerList.tpl');
    }

}
