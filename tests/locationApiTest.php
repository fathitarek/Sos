<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class locationApiTest extends TestCase
{
    use MakelocationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatelocation()
    {
        $location = $this->fakelocationData();
        $this->json('POST', '/api/v1/locations', $location);

        $this->assertApiResponse($location);
    }

    /**
     * @test
     */
    public function testReadlocation()
    {
        $location = $this->makelocation();
        $this->json('GET', '/api/v1/locations/'.$location->id);

        $this->assertApiResponse($location->toArray());
    }

    /**
     * @test
     */
    public function testUpdatelocation()
    {
        $location = $this->makelocation();
        $editedlocation = $this->fakelocationData();

        $this->json('PUT', '/api/v1/locations/'.$location->id, $editedlocation);

        $this->assertApiResponse($editedlocation);
    }

    /**
     * @test
     */
    public function testDeletelocation()
    {
        $location = $this->makelocation();
        $this->json('DELETE', '/api/v1/locations/'.$location->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/locations/'.$location->id);

        $this->assertResponseStatus(404);
    }
}
