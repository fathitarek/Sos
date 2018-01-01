<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class routeApiTest extends TestCase
{
    use MakerouteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateroute()
    {
        $route = $this->fakerouteData();
        $this->json('POST', '/api/v1/routes', $route);

        $this->assertApiResponse($route);
    }

    /**
     * @test
     */
    public function testReadroute()
    {
        $route = $this->makeroute();
        $this->json('GET', '/api/v1/routes/'.$route->id);

        $this->assertApiResponse($route->toArray());
    }

    /**
     * @test
     */
    public function testUpdateroute()
    {
        $route = $this->makeroute();
        $editedroute = $this->fakerouteData();

        $this->json('PUT', '/api/v1/routes/'.$route->id, $editedroute);

        $this->assertApiResponse($editedroute);
    }

    /**
     * @test
     */
    public function testDeleteroute()
    {
        $route = $this->makeroute();
        $this->json('DELETE', '/api/v1/routes/'.$route->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/routes/'.$route->id);

        $this->assertResponseStatus(404);
    }
}
