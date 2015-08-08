<?php
// web/app.php
 
use Symfony\Component\HttpFoundation\Request;
 
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/AppKernel.php';
 

// Crear instancia del kernel. Entorno producción. Debug desabilitado
$kernel = new AppKernel('prod', false); 
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);