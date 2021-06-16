<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('productList');
App::getRouter()->setLoginRoute('login');

Utils::addRoute('productList',    'ProductListCtrl');
Utils::addRoute('productListPart',    'ProductListCtrl');
Utils::addRoute('nextProductPage',    'ProductListCtrl');
Utils::addRoute('previousProductPage',    'ProductListCtrl');
Utils::addRoute('givenProductPage',    'ProductListCtrl');
Utils::addRoute('producerList',    'ProducerListCtrl');
Utils::addRoute('producerListPart',    'ProducerListCtrl');
Utils::addRoute('nextProducerPage',    'ProducerListCtrl');
Utils::addRoute('previousProducerPage',    'ProducerListCtrl');
Utils::addRoute('givenProducerPage',    'ProducerListCtrl');
Utils::addRoute('loginShow',     'LoginCtrl');
Utils::addRoute('login',         'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl');
Utils::addRoute('newUser',     'LoginCtrl');
Utils::addRoute('userAdd',     'LoginCtrl');
Utils::addRoute('userDelete',     'LoginCtrl');
Utils::addRoute('productAdd',     'ProductEditCtrl',	['user','admin']);
Utils::addRoute('productEdit',    'ProductEditCtrl',	['user','admin']);
Utils::addRoute('productSave',    'ProductEditCtrl',	['user','admin']);
Utils::addRoute('productDelete',  'ProductEditCtrl',	['admin']);
Utils::addRoute('producerAdd',     'ProducerEditCtrl',	['user','admin']);
Utils::addRoute('producerEdit',    'ProducerEditCtrl',	['user','admin']);
Utils::addRoute('producerSave',    'ProducerEditCtrl',	['user','admin']);
Utils::addRoute('producerDelete',  'ProducerEditCtrl',	['admin']);