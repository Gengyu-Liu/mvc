<?php

abstract class Controller {
    
    protected $view;
    
    public function __construct() {
        echo 'Basis-Controller<br>';
        $this->view = new View();
    }
}
