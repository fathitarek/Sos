<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class cityApiTest extends TestCase
{
    use MakecityTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatecity()
    {
        $city = $this->fakecityData();
        $this->json('POST', '/api/v1/cities', $city);

        $this->assertApiResponse($city);
    }

    /**
     * @test
     */
    public function testReadcity()
    {
        $city = $this->makecity();
        $this->json('GET', '/api/v1/cities/'.$city->id);

        $this->assertApiResponse($city->toArray());
    }

    /**
     * @test
     */
    public function testUpdatecity()
    {
        $city = $this->makecity();
        $editedcity = $this->fakecityData();

        $this->json('PUT', '/api/v1/cities/'.$city->id, $editedcity);

        $this->assertApiResponse($editedcity);
    }

    /**
     * @test
     */
    public function testDeletecity()
    {
        $city = $this->makecity();
        $this->json('DELETE', '/api/v1/cities/'.$city->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cities/'.$city->id);

        $this->assertResponseStatus(404);
    }
}
