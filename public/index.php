<?php
// Mulai session sekali di sini
session_start();

// Load config
require_once dirname(__DIR__) . '/config/config.php';

// Autoload core files
require_once dirname(__DIR__) . '/app/core/App.php';
require_once dirname(__DIR__) . '/app/core/Controller.php';
require_once dirname(__DIR__) . '/app/core/Database.php';
require_once dirname(__DIR__) . '/app/core/Helper.php';
require_once dirname(__DIR__) . '/app/core/Functions.php';

$app = new App();
