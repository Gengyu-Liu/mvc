<?php

class Hallo_model extends Model{
    public function __construct() {
        parent::__construct();
        echo 'Objekt von Hallo_model<br>';
    }
    public function addieren($zahl1, $zahl2) {
        return $zahl1 + $zahl2;
    }
    public function set_news(){
        echo 'Methode set_news() aus der Klasse Hallo_model<br>';
        $this->db->insert('news',['title' => 'neu', 'slug' => 'neu', 'text' => 'neu']);
    }

}
