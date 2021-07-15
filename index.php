<?php
require_once 'system/Autoloader.php';
require_once 'system/Bootstrap.php';
require_once 'system/Controller.php';
require_once 'system/View.php';
require_once 'system/Model.php';
require_once 'system/Database.php';
require_once 'system/Config.php';

Autoloader::register();
$bootstrap = new Bootstrap();