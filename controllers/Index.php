<?php

class Index extends Controller{
    public function __construct() {
        parent::__construct();
        echo 'Objekt vom Index-Controller<br>';
    }
    public function methode1(){
        echo 'methode 1 von Index-Controller<br>';
    }
    public function methode2($value='default value'){
        echo 'methode 2 von Index-Controller<br>';
        echo 'Wert: '.$value.'<br>';
    }   
    public function methode3(){
        echo 'methode 3 von Index-Controller<br>';
        $this->view->render('viewa');
    }
}
