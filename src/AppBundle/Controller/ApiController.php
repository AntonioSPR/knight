<?php
// src/AppBundle/Controller/ApiController.php
 
namespace AppBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
 
class ApiController extends Controller
{
    public function cotizacionAction(Request $request, $empresa)
    {
        return new Response('', Response::HTTP_NO_CONTENT);
    }

    public function informacionAction(Request $request)
    {
    	$contenidoDeLaPeticion = $request->getContent();
    	$contenidoEnviado = json_deconde($contenidoDeLaPeticion, true);

    	if (!isset($contenidoEnviado['empresa'])
    		|| 'ACME' !== $contenidoEnviado['empresa']) 
    	{
    			$respuesta['mensaje'] = 'ERROR - Empresa desconocida';
    		$codigoEstado = Response::HTTP_UNPROCESSABLE_ENTITY;
    	}
    	else 
    	{
    		$respuesta['mensaje'] = 'ok';
    		$respuesta['empresa'] = array(...);
    		$codigoEstado = Response::HTTP_OK;
    	}
    	return new JsonResponse($respuesta, $codigoEstado);
    }

    public function niAction(Request $request)
    {
        $postedContent = $request->getContent();
        $postedValues = json_decode($postedContent, true);

        $answer = array('answer' => 'Ecky-ecky-ecky-ecky-pikang-zoop-boing-goodem-zoo-owli-zhiv');
        $statusCode = Response::HTTP_OK;
        if (!isset($postedValues['offering']) || 'shrubbery' !== $postedValues['offering']) {
            $answer['answer'] = 'Ni';
            $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY;
        }

        return new JsonResponse($answer, $statusCode);
    }
}