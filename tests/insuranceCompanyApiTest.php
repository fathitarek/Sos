<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class insuranceCompanyApiTest extends TestCase
{
    use MakeinsuranceCompanyTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateinsuranceCompany()
    {
        $insuranceCompany = $this->fakeinsuranceCompanyData();
        $this->json('POST', '/api/v1/insuranceCompanies', $insuranceCompany);

        $this->assertApiResponse($insuranceCompany);
    }

    /**
     * @test
     */
    public function testReadinsuranceCompany()
    {
        $insuranceCompany = $this->makeinsuranceCompany();
        $this->json('GET', '/api/v1/insuranceCompanies/'.$insuranceCompany->id);

        $this->assertApiResponse($insuranceCompany->toArray());
    }

    /**
     * @test
     */
    public function testUpdateinsuranceCompany()
    {
        $insuranceCompany = $this->makeinsuranceCompany();
        $editedinsuranceCompany = $this->fakeinsuranceCompanyData();

        $this->json('PUT', '/api/v1/insuranceCompanies/'.$insuranceCompany->id, $editedinsuranceCompany);

        $this->assertApiResponse($editedinsuranceCompany);
    }

    /**
     * @test
     */
    public function testDeleteinsuranceCompany()
    {
        $insuranceCompany = $this->makeinsuranceCompany();
        $this->json('DELETE', '/api/v1/insuranceCompanies/'.$insuranceCompany->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/insuranceCompanies/'.$insuranceCompany->id);

        $this->assertResponseStatus(404);
    }
}
