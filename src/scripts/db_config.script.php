<?php
define('DB_NAME', 'Dalli');
define('DB_USER', 'Client');
define('DB_PASSWORD', 'Client');
define('DB_HOST', '127.0.0.1');

$pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);