<?php

use App\Models\city;
use App\Repositories\cityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class cityRepositoryTest extends TestCase
{
    use MakecityTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var cityRepository
     */
    protected $cityRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cityRepo = App::make(cityRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatecity()
    {
        $city = $this->fakecityData();
        $createdcity = $this->cityRepo->create($city);
        $createdcity = $createdcity->toArray();
        $this->assertArrayHasKey('id', $createdcity);
        $this->assertNotNull($createdcity['id'], 'Created city must have id specified');
        $this->assertNotNull(city::find($createdcity['id']), 'city with given id must be in DB');
        $this->assertModelData($city, $createdcity);
    }

    /**
     * @test read
     */
    public function testReadcity()
    {
        $city = $this->makecity();
        $dbcity = $this->cityRepo->find($city->id);
        $dbcity = $dbcity->toArray();
        $this->assertModelData($city->toArray(), $dbcity);
    }

    /**
     * @test update
     */
    public function testUpdatecity()
    {
        $city = $this->makecity();
        $fakecity = $this->fakecityData();
        $updatedcity = $this->cityRepo->update($fakecity, $city->id);
        $this->assertModelData($fakecity, $updatedcity->toArray());
        $dbcity = $this->cityRepo->find($city->id);
        $this->assertModelData($fakecity, $dbcity->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletecity()
    {
        $city = $this->makecity();
        $resp = $this->cityRepo->delete($city->id);
        $this->assertTrue($resp);
        $this->assertNull(city::find($city->id), 'city should not exist in DB');
    }
}
