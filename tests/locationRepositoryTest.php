<?php

use App\Models\location;
use App\Repositories\locationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class locationRepositoryTest extends TestCase
{
    use MakelocationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var locationRepository
     */
    protected $locationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->locationRepo = App::make(locationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatelocation()
    {
        $location = $this->fakelocationData();
        $createdlocation = $this->locationRepo->create($location);
        $createdlocation = $createdlocation->toArray();
        $this->assertArrayHasKey('id', $createdlocation);
        $this->assertNotNull($createdlocation['id'], 'Created location must have id specified');
        $this->assertNotNull(location::find($createdlocation['id']), 'location with given id must be in DB');
        $this->assertModelData($location, $createdlocation);
    }

    /**
     * @test read
     */
    public function testReadlocation()
    {
        $location = $this->makelocation();
        $dblocation = $this->locationRepo->find($location->id);
        $dblocation = $dblocation->toArray();
        $this->assertModelData($location->toArray(), $dblocation);
    }

    /**
     * @test update
     */
    public function testUpdatelocation()
    {
        $location = $this->makelocation();
        $fakelocation = $this->fakelocationData();
        $updatedlocation = $this->locationRepo->update($fakelocation, $location->id);
        $this->assertModelData($fakelocation, $updatedlocation->toArray());
        $dblocation = $this->locationRepo->find($location->id);
        $this->assertModelData($fakelocation, $dblocation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletelocation()
    {
        $location = $this->makelocation();
        $resp = $this->locationRepo->delete($location->id);
        $this->assertTrue($resp);
        $this->assertNull(location::find($location->id), 'location should not exist in DB');
    }
}
