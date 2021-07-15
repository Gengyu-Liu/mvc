<?php

class Hallo extends Controller{

    public function __construct() {
        parent::__construct();
        echo 'Objekt vom Hallo-Controller<br>';
    }
    public function methode1(){
        echo 'methode 1 von Hallo-Controller<br>';
    }
    public function methode2($value='default value'){
        echo 'methode 2 von Hallo-Controller<br>';
        echo 'Wert: '.$value.'<br>';
    }   
    public function methode3(){
        echo 'methode 3 von Hallo-Controller<br>';
        $this->view->render('viewa');
    }
    public function methode4() {
        echo 'Methode 4 vom Hallo_Controller<br>';
        
//        require 'models/Hallo_model.php';
        $hallo_model = new Hallo_Model();
        echo $hallo_model->addieren(10,7);
        
    }
    public function methode5(){
        echo 'Methode 5 vom Hallo-Controller<br>';
        $hallo_model = new Hallo_model();
        $hallo_model->set_news();
    }
}
