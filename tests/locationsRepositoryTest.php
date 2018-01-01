<?php

use App\Models\locations;
use App\Repositories\locationsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class locationsRepositoryTest extends TestCase
{
    use MakelocationsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var locationsRepository
     */
    protected $locationsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->locationsRepo = App::make(locationsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatelocations()
    {
        $locations = $this->fakelocationsData();
        $createdlocations = $this->locationsRepo->create($locations);
        $createdlocations = $createdlocations->toArray();
        $this->assertArrayHasKey('id', $createdlocations);
        $this->assertNotNull($createdlocations['id'], 'Created locations must have id specified');
        $this->assertNotNull(locations::find($createdlocations['id']), 'locations with given id must be in DB');
        $this->assertModelData($locations, $createdlocations);
    }

    /**
     * @test read
     */
    public function testReadlocations()
    {
        $locations = $this->makelocations();
        $dblocations = $this->locationsRepo->find($locations->id);
        $dblocations = $dblocations->toArray();
        $this->assertModelData($locations->toArray(), $dblocations);
    }

    /**
     * @test update
     */
    public function testUpdatelocations()
    {
        $locations = $this->makelocations();
        $fakelocations = $this->fakelocationsData();
        $updatedlocations = $this->locationsRepo->update($fakelocations, $locations->id);
        $this->assertModelData($fakelocations, $updatedlocations->toArray());
        $dblocations = $this->locationsRepo->find($locations->id);
        $this->assertModelData($fakelocations, $dblocations->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletelocations()
    {
        $locations = $this->makelocations();
        $resp = $this->locationsRepo->delete($locations->id);
        $this->assertTrue($resp);
        $this->assertNull(locations::find($locations->id), 'locations should not exist in DB');
    }
}
