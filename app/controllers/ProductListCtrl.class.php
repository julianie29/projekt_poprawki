<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\ProductSearchForm;

class ProductListCtrl {

    private $form;
    private $search_params = [];
    private $records;


    public function __construct() {
        $this->form = new ProductSearchForm();
    }

    public function validate()
    {
        $this->form->type = ParamUtils::getFromRequest('type');
        $this->form->filter = ParamUtils::getFromRequest('filter');

        if (isset($this->form->filter) && strlen($this->form->filter) > 0) {
            switch ($this->form->type) {
                case "code":
                    $this->search_params['product.code[~]'] = $this->form->filter.'%';
                    break;
                case "name":
                    $this->search_params['product.name[~]'] = $this->form->filter.'%';
                    break;
                case "type":
                    $this->search_params['product.type[~]'] = $this->form->filter.'%';
                    break;
                case "format":
                    $this->search_params['product.format[~]'] = $this->form->filter.'%';
                    break;
                case "amount":
                    $this->search_params['product.amount[~]'] = $this->form->filter.'%';
                    break;
                case "price":
                    $this->search_params['product.price[~]'] = $this->form->filter.'%';
                    break;
                case "producer":
                    $this->search_params['producer.producer_name[~]'] = $this->form->filter.'%';
                    break;
                case "country":
                    $this->search_params['producer.country[~]'] = $this->form->filter . '%';
                    break;
            }
        }

        return !App::getMessages()->isError();
    }

    public function action_productList() {
        $this->validate();

        $num_params = sizeof($this->search_params);
        if ($num_params > 1) {
            $where = [ "AND" => &$this->search_params ];
        } else {
            $where = &$this->search_params;
        }

       $where ["ORDER"] = "product.name";

        try {
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

        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('product', $this->records);
        App::getSmarty()->display('ProductList.tpl');
    }

}
