<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class visitApiTest extends TestCase
{
    use MakevisitTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatevisit()
    {
        $visit = $this->fakevisitData();
        $this->json('POST', '/api/v1/visits', $visit);

        $this->assertApiResponse($visit);
    }

    /**
     * @test
     */
    public function testReadvisit()
    {
        $visit = $this->makevisit();
        $this->json('GET', '/api/v1/visits/'.$visit->id);

        $this->assertApiResponse($visit->toArray());
    }

    /**
     * @test
     */
    public function testUpdatevisit()
    {
        $visit = $this->makevisit();
        $editedvisit = $this->fakevisitData();

        $this->json('PUT', '/api/v1/visits/'.$visit->id, $editedvisit);

        $this->assertApiResponse($editedvisit);
    }

    /**
     * @test
     */
    public function testDeletevisit()
    {
        $visit = $this->makevisit();
        $this->json('DELETE', '/api/v1/visits/'.$visit->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/visits/'.$visit->id);

        $this->assertResponseStatus(404);
    }
}
