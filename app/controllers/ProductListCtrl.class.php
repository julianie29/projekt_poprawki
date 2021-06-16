<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\SearchForm;

class ProductListCtrl {

    private $form;
    private $search_params = [];
    private $records;


    public function __construct() {
        $this->form = new SearchForm();
    }

    public function validate()
    {
        $this->form->filter = ParamUtils::getFromRequest('filter');

        if (isset($this->form->filter) && strlen($this->form->filter) > 0) {
            $this->form->filter = '%'.$this->form->filter.'%';

            $this->search_params['product.code[~]'] = $this->form->filter;
            $this->search_params['product.name[~]'] = $this->form->filter;
            $this->search_params['product.type[~]'] = $this->form->filter;
            $this->search_params['product.format[~]'] = $this->form->filter;
            $this->search_params['product.amount[~]'] = $this->form->filter;
            $this->search_params['product.price[~]'] = $this->form->filter;
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
                'product.code[~]' => &$this->search_params['product.code[~]'],
                'product.name[~]' => &$this->search_params['product.name[~]'],
                'product.type[~]' => &$this->search_params['product.type[~]'],
                'product.format[~]' => &$this->search_params['product.format[~]'],
                'product.amount[~]' => &$this->search_params['product.amount[~]'],
                'product.price[~]' => &$this->search_params['product.price[~]'],
                'producer.producer_name[~]' => &$this->search_params['producer.producer_name[~]'],
                'producer.country[~]' => &$this->search_params['producer.country[~]']
                ]
            ];

            $this->form->count_items = App::getDB()->count("product",
                [
                    "[>]producer" => ["id_producer" => "id"]
                ],[
                "product.id"
            ], $where);

        } else {
            $where = &$this->search_params;
            $this->form->count_items = App::getDB()->count("product");
        }

        $where ["ORDER"] = "product.name";
        $where ["LIMIT"] = [$this->form->offset, $this->form->limit_per_page];

        try {

            if ($this->form->count_items > $this->form->limit_per_page){
                $this->form->size = $this->form->count_items - $this->form->limit_per_page;
            } else {
                $this->form->size = 0;
            }

            $count_pages = $this->form->count_items / $this->form->limit_per_page;
            $this->form->max_page = ceil($count_pages); //zaokraglenie w gore

            $this->records = App::getDB()->select("product",
                [
                    "[>]producer" => ["id_producer" => "id"]
                ],
                [
                    "product.id",
                    "product.code",
                    "product.name",
                    "product.type",
                    "product.format",
                    "product.amount",
                    "product.price",
                    "producer.producer_name",
                    "producer.country",
                ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

    }

    public function action_productList() {
        $this->load_data();
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('product', $this->records);
        App::getSmarty()->display('ProductListFullPage.tpl');
    }

    public function action_productListPart() {
        $this->load_data();
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('product', $this->records);
        App::getSmarty()->display('ProductListTable.tpl');
    }

    public function action_previousProductPage() {
        $new_page = ParamUtils::getFromGet('page', true, 'Błędne wywołanie aplikacji');
        $new_page--;
        $this->form->page = $new_page;
        $this->action_productListPart();
    }

    public function action_nextProductPage() {
        $new_page = ParamUtils::getFromGet('page', true, 'Błędne wywołanie aplikacji');
        $new_page++;
        $this->form->page = $new_page;
        $this->action_productListPart();
    }

    public function action_givenProductPage() {
        $new_page = ParamUtils::getFromRequest('page', true, 'Błędne wywołanie aplikacji');

        $size = ParamUtils::getFromRequest('max_page', true, 'Błędne wywołanie aplikacji');

        if ($new_page > $size) {
            Utils::addErrorMessage('Strona nie istnieje');
            $this->form->page = 1;
            $this->action_productListPart();
        } elseif ($new_page < 1) {
            Utils::addErrorMessage('Strony zaczynają się od 1');
            $this->action_productListPart();
        } else {
            $this->form->page = $new_page;
            $this->action_productListPart();
        }
    }

}
