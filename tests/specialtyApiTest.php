<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class specialtyApiTest extends TestCase
{
    use MakespecialtyTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatespecialty()
    {
        $specialty = $this->fakespecialtyData();
        $this->json('POST', '/api/v1/specialties', $specialty);

        $this->assertApiResponse($specialty);
    }

    /**
     * @test
     */
    public function testReadspecialty()
    {
        $specialty = $this->makespecialty();
        $this->json('GET', '/api/v1/specialties/'.$specialty->id);

        $this->assertApiResponse($specialty->toArray());
    }

    /**
     * @test
     */
    public function testUpdatespecialty()
    {
        $specialty = $this->makespecialty();
        $editedspecialty = $this->fakespecialtyData();

        $this->json('PUT', '/api/v1/specialties/'.$specialty->id, $editedspecialty);

        $this->assertApiResponse($editedspecialty);
    }

    /**
     * @test
     */
    public function testDeletespecialty()
    {
        $specialty = $this->makespecialty();
        $this->json('DELETE', '/api/v1/specialties/'.$specialty->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/specialties/'.$specialty->id);

        $this->assertResponseStatus(404);
    }
}
