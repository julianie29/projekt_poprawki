<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\SearchForm;

class ProducerListCtrl {

    private $records;
    private $form;
    private $search_params = [];


    public function __construct() {
        $this->form = new SearchForm();
    }

    public function validate()
    {
        $this->form->filter = ParamUtils::getFromRequest('filter');

        if (isset($this->form->filter) && strlen($this->form->filter) > 0) {
            $this->form->filter = '%'.$this->form->filter.'%';

            $this->search_params['producer.producer_name[~]'] = $this->form->filter;
            $this->search_params['producer.country[~]'] = $this->form->filter;
        }

        return !App::getMessages()->isError();
    }


    public function load_data() {
        $this->validate();

        //licz offset
        if ($this->form->page > 1) {
            $this->form->offset = $this->form->limit_per_page * ($this->form->page - 1);
        } else {
            $this->form->offset = 0;
            $this->form->page = 1;
        }

        $num_params = sizeof($this->search_params);

        $where = &$this->search_params;
        if ($num_params > 1) {
            $where = [ "OR" => [
                'producer.producer_name[~]' => &$this->search_params['producer.producer_name[~]'],
                'producer.country[~]' => &$this->search_params['producer.country[~]'],
            ]
            ];

            $this->form->count_items = App::getDB()->count("producer", [
                "producer.id"
            ], $where);
        } else {
            $where = &$this->search_params;
            $this->form->count_items = App::getDB()->count("producer");
        }

        $where ["ORDER"] = "producer.producer_name";
        $where ["LIMIT"] = [$this->form->offset, $this->form->limit_per_page];

        try {

            if ($this->form->count_items > $this->form->limit_per_page){
                $this->form->size = $this->form->count_items - $this->form->limit_per_page;
            } else {
                $this->form->size = 0;
            }

            $count_pages = $this->form->count_items / $this->form->limit_per_page;
            $this->form->max_page = ceil($count_pages); //zaokraglenie w gore

            $this->records = App::getDB()->select("producer",
                [
                "id",
                "producer_name",
                "country",
                 ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

    }

    public function action_producerList() {
        $this->load_data();
        App::getSmarty()->assign('producer', $this->records);
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->display('ProducerListFullPage.tpl');
    }


    public function action_producerListPart() {
        $this->load_data();
        App::getSmarty()->assign('producer', $this->records);
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->display('ProducerListTable.tpl');
    }

    public function action_previousProducerPage() {
        $new_page = ParamUtils::getFromGet('page', true, 'Błędne wywołanie aplikacji');
        $new_page--;
        $this->form->page = $new_page;
        $this->action_producerListPart();
    }

    public function action_nextProducerPage() {
        $new_page = ParamUtils::getFromGet('page', true, 'Błędne wywołanie aplikacji');
        $new_page++;
        $this->form->page = $new_page;
        $this->action_producerListPart();
    }

    public function action_givenProducerPage() {
        $new_page = ParamUtils::getFromRequest('page', true, 'Błędne wywołanie aplikacji');

        $size = ParamUtils::getFromRequest('max_page', true, 'Błędne wywołanie aplikacji');

        if ($new_page > $size) {
            Utils::addErrorMessage('Strona nie istnieje');
            $this->form->page = 1;
            $this->action_producerListPart();
        } elseif ($new_page < 1) {
            Utils::addErrorMessage('Strony zaczynają się od 1');
            $this->action_producerListPart();
        } else {
            $this->form->page = $new_page;
            $this->action_producerListPart();
        }
    }

}
