<?php

abstract class Model {
    protected $db;
    public function __construct() {
        echo 'Basis-Model<br>';
        $this->db = new Database();
    }

}
