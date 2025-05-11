<?php
require __DIR__ .'/bootstrap.php';
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

use App\Infrastructure\Routing\Request;

$router->dispatch(new Request());