<?php

use App\Models\specialty;
use App\Repositories\specialtyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class specialtyRepositoryTest extends TestCase
{
    use MakespecialtyTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var specialtyRepository
     */
    protected $specialtyRepo;

    public function setUp()
    {
        parent::setUp();
        $this->specialtyRepo = App::make(specialtyRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatespecialty()
    {
        $specialty = $this->fakespecialtyData();
        $createdspecialty = $this->specialtyRepo->create($specialty);
        $createdspecialty = $createdspecialty->toArray();
        $this->assertArrayHasKey('id', $createdspecialty);
        $this->assertNotNull($createdspecialty['id'], 'Created specialty must have id specified');
        $this->assertNotNull(specialty::find($createdspecialty['id']), 'specialty with given id must be in DB');
        $this->assertModelData($specialty, $createdspecialty);
    }

    /**
     * @test read
     */
    public function testReadspecialty()
    {
        $specialty = $this->makespecialty();
        $dbspecialty = $this->specialtyRepo->find($specialty->id);
        $dbspecialty = $dbspecialty->toArray();
        $this->assertModelData($specialty->toArray(), $dbspecialty);
    }

    /**
     * @test update
     */
    public function testUpdatespecialty()
    {
        $specialty = $this->makespecialty();
        $fakespecialty = $this->fakespecialtyData();
        $updatedspecialty = $this->specialtyRepo->update($fakespecialty, $specialty->id);
        $this->assertModelData($fakespecialty, $updatedspecialty->toArray());
        $dbspecialty = $this->specialtyRepo->find($specialty->id);
        $this->assertModelData($fakespecialty, $dbspecialty->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletespecialty()
    {
        $specialty = $this->makespecialty();
        $resp = $this->specialtyRepo->delete($specialty->id);
        $this->assertTrue($resp);
        $this->assertNull(specialty::find($specialty->id), 'specialty should not exist in DB');
    }
}
