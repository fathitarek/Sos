<?php

use App\Models\insuranceCompany;
use App\Repositories\insuranceCompanyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class insuranceCompanyRepositoryTest extends TestCase
{
    use MakeinsuranceCompanyTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var insuranceCompanyRepository
     */
    protected $insuranceCompanyRepo;

    public function setUp()
    {
        parent::setUp();
        $this->insuranceCompanyRepo = App::make(insuranceCompanyRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateinsuranceCompany()
    {
        $insuranceCompany = $this->fakeinsuranceCompanyData();
        $createdinsuranceCompany = $this->insuranceCompanyRepo->create($insuranceCompany);
        $createdinsuranceCompany = $createdinsuranceCompany->toArray();
        $this->assertArrayHasKey('id', $createdinsuranceCompany);
        $this->assertNotNull($createdinsuranceCompany['id'], 'Created insuranceCompany must have id specified');
        $this->assertNotNull(insuranceCompany::find($createdinsuranceCompany['id']), 'insuranceCompany with given id must be in DB');
        $this->assertModelData($insuranceCompany, $createdinsuranceCompany);
    }

    /**
     * @test read
     */
    public function testReadinsuranceCompany()
    {
        $insuranceCompany = $this->makeinsuranceCompany();
        $dbinsuranceCompany = $this->insuranceCompanyRepo->find($insuranceCompany->id);
        $dbinsuranceCompany = $dbinsuranceCompany->toArray();
        $this->assertModelData($insuranceCompany->toArray(), $dbinsuranceCompany);
    }

    /**
     * @test update
     */
    public function testUpdateinsuranceCompany()
    {
        $insuranceCompany = $this->makeinsuranceCompany();
        $fakeinsuranceCompany = $this->fakeinsuranceCompanyData();
        $updatedinsuranceCompany = $this->insuranceCompanyRepo->update($fakeinsuranceCompany, $insuranceCompany->id);
        $this->assertModelData($fakeinsuranceCompany, $updatedinsuranceCompany->toArray());
        $dbinsuranceCompany = $this->insuranceCompanyRepo->find($insuranceCompany->id);
        $this->assertModelData($fakeinsuranceCompany, $dbinsuranceCompany->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteinsuranceCompany()
    {
        $insuranceCompany = $this->makeinsuranceCompany();
        $resp = $this->insuranceCompanyRepo->delete($insuranceCompany->id);
        $this->assertTrue($resp);
        $this->assertNull(insuranceCompany::find($insuranceCompany->id), 'insuranceCompany should not exist in DB');
    }
}
