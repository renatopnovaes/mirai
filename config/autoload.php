<?php
require_once dirname(__DIR__) . "/vendor/autoload.php";

use Symfony\Component\Dotenv\Dotenv;
use MongoDB\Client;
use MongoDB\Driver\ServerApi;

$dotenv = new Dotenv();
$dotenv->load(dirname(__DIR__) . '/.env');
