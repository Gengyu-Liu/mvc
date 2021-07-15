<?php

class Autoloader {
    private function __construct() {
        spl_autoload_register([$this,'loadModel']);
    }
    
    public static function register() {
        new Autoloader();
    }
    private function loadModel($className) {
        if(file_exists('models/'.$className.'.php')){
            require 'models/'.$className.'.php';
        }
        else
            throw new Exception ('Model '. $className.' nicht gefunden');
    }
}
