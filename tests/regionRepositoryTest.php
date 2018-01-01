<?php

use App\Models\region;
use App\Repositories\regionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class regionRepositoryTest extends TestCase
{
    use MakeregionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var regionRepository
     */
    protected $regionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->regionRepo = App::make(regionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateregion()
    {
        $region = $this->fakeregionData();
        $createdregion = $this->regionRepo->create($region);
        $createdregion = $createdregion->toArray();
        $this->assertArrayHasKey('id', $createdregion);
        $this->assertNotNull($createdregion['id'], 'Created region must have id specified');
        $this->assertNotNull(region::find($createdregion['id']), 'region with given id must be in DB');
        $this->assertModelData($region, $createdregion);
    }

    /**
     * @test read
     */
    public function testReadregion()
    {
        $region = $this->makeregion();
        $dbregion = $this->regionRepo->find($region->id);
        $dbregion = $dbregion->toArray();
        $this->assertModelData($region->toArray(), $dbregion);
    }

    /**
     * @test update
     */
    public function testUpdateregion()
    {
        $region = $this->makeregion();
        $fakeregion = $this->fakeregionData();
        $updatedregion = $this->regionRepo->update($fakeregion, $region->id);
        $this->assertModelData($fakeregion, $updatedregion->toArray());
        $dbregion = $this->regionRepo->find($region->id);
        $this->assertModelData($fakeregion, $dbregion->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteregion()
    {
        $region = $this->makeregion();
        $resp = $this->regionRepo->delete($region->id);
        $this->assertTrue($resp);
        $this->assertNull(region::find($region->id), 'region should not exist in DB');
    }
}
