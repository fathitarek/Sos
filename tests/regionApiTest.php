<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class regionApiTest extends TestCase
{
    use MakeregionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateregion()
    {
        $region = $this->fakeregionData();
        $this->json('POST', '/api/v1/regions', $region);

        $this->assertApiResponse($region);
    }

    /**
     * @test
     */
    public function testReadregion()
    {
        $region = $this->makeregion();
        $this->json('GET', '/api/v1/regions/'.$region->id);

        $this->assertApiResponse($region->toArray());
    }

    /**
     * @test
     */
    public function testUpdateregion()
    {
        $region = $this->makeregion();
        $editedregion = $this->fakeregionData();

        $this->json('PUT', '/api/v1/regions/'.$region->id, $editedregion);

        $this->assertApiResponse($editedregion);
    }

    /**
     * @test
     */
    public function testDeleteregion()
    {
        $region = $this->makeregion();
        $this->json('DELETE', '/api/v1/regions/'.$region->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/regions/'.$region->id);

        $this->assertResponseStatus(404);
    }
}
