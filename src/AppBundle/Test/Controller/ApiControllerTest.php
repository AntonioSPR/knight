<?php
// src/AppBundle/Tests/Controller/ApiControllerTest.php
namespace AppBundle\Tests\Controller;
 
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
 
class ApiControllerTest extends WebTestCase
{
	private function post($uri, array $data)
	{
		$content = json_encode($data);
		$client = static::createClient();
		$client->request('POST', $uri, array(), array(), array(), $content);

		return $client->getResponse();
	}

    public function testInformacionSobreEmpresaExistente()
    {
        $response = $this->post('/api/informacion', array('empresa' => 'ACME'));
  
        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
    }

    public function testInformacionSobreEmpresaInexistente()
    {
        $response = $this->post('/api/informacion', array('empresa' => 'NO_EXISTE'));
 
        $this->assertSame(Response::HTTP_UNPROCESSABLE_ENTITY, $response->getStatusCode());
    }
}
