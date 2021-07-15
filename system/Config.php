<?php

class Config{
    private $config_arr;
    private static $instance = NULL;
    
    private function __construct(){
        $this->config_arr = require 'configs/config.php';
    }
    private function __clone(){
        
    }

    public static function getInstance(){
        if(self::$instance == NULL){
            self::$instance = new Config();
        }
        return self::$instance;
    }
    public function get($key){
        return $this->config_arr[$key];
    }
}

