<?php
use Symfony\Component\Dotenv\Dotenv;

$basepath = realpath(dirname(__FILE__) . '/../..');

require $basepath . '/vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load($basepath . '/.env');