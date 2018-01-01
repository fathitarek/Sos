<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class locationsApiTest extends TestCase
{
    use MakelocationsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatelocations()
    {
        $locations = $this->fakelocationsData();
        $this->json('POST', '/api/v1/locations', $locations);

        $this->assertApiResponse($locations);
    }

    /**
     * @test
     */
    public function testReadlocations()
    {
        $locations = $this->makelocations();
        $this->json('GET', '/api/v1/locations/'.$locations->id);

        $this->assertApiResponse($locations->toArray());
    }

    /**
     * @test
     */
    public function testUpdatelocations()
    {
        $locations = $this->makelocations();
        $editedlocations = $this->fakelocationsData();

        $this->json('PUT', '/api/v1/locations/'.$locations->id, $editedlocations);

        $this->assertApiResponse($editedlocations);
    }

    /**
     * @test
     */
    public function testDeletelocations()
    {
        $locations = $this->makelocations();
        $this->json('DELETE', '/api/v1/locations/'.$locations->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/locations/'.$locations->id);

        $this->assertResponseStatus(404);
    }
}
