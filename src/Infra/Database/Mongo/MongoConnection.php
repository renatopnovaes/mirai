<?php
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

use MongoDB\Client;

$client = new Client("mongodb+srv://renatopnovaes:teste123@mirai.f6at6nk.mongodb.net/");
