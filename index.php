<?php
require __DIR__ .'/bootstrap.php';

use App\Infrastructure\Routing\Request;

$router->dispatch(new Request());