<?php

require ___DIR___ . '/../vendor/autoload.php';
$app=require_once __DIR_ . '/../bootstrap/app.php';


// Run the application
$kernel=$app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();
$kernel->terminate($request, $response);