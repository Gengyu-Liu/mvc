<?php

class Bootstrap {

    public function __construct() {
        //Wurde an der URL etwas angehängt
        if (isset($_GET['nav'])) {
            //Falls am Ende ein Slash in der URL steht, Slash entfernen
            $nav = rtrim($_GET['nav'], '/');
        } else {
            //Falls kein Controller ausgewählt wurde, wird der Index-Controller gewählt
            $nav = 'Index';
        }
//Aus der angehängten URL alle Bestandteile herrausziehen (Controller, Methode, Parameterwert)
        $nav_arr = explode('/', $nav);
//Dateiname für den Controller
        $controllerFilename = 'controllers/' . ucfirst(strtolower($nav_arr[0])) . '.php';
//Existiert der Controller überhaupt?
        if (file_exists($controllerFilename)) {
            //Controller einbinden
            require_once $controllerFilename;
        } else {
            throw new Exception("Controller " . $nav_arr[0] . " existiert nicht");
        }
//Objekt von der Controller-Klasse erzeugen
        $controller = new $nav_arr[0];
//Gibt es einen Parameterwert?
        if (isset($nav_arr[2])) {
            //Methode mit Parameterwert aufrufen
            $controller->{$nav_arr[1]}($nav_arr[2]);
//Gibt es einen Methodename - ohne Parameterwert?
        } elseif (isset($nav_arr[1])) {
            //Methode ohne parameterwert aufrufen
            $controller->{$nav_arr[1]}();
        }
    }

}
