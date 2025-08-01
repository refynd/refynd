<?php

/**
 * Refynd Application Entry Point
 * 
 * This file serves as the front controller for all HTTP requests.
 * It bootstraps the Refynd Engine and handles the request/response cycle.
 */

use Refynd\Bootstrap\Engine;
use App\Bootstrap\AppProfile;

// Load Composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Bootstrap the application
$engine = new Engine(new AppProfile());

// Handle the HTTP request and send response
$response = $engine->runHttp();
$response->send();
