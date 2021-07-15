<?php

class View {
    public function __construct() {
        echo 'Projekt der Klasse View<br>';
    }
    public function render($view){
        if(file_exists('views/'.$view.'.php')){
            require 'views/'.$view.'.php';
        }
        else{
            throw new exception('File '.'views/'.$view.'.php'.' existiert nicht');
        }
    }
}
