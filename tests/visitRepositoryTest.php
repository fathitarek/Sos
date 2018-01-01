<?php

use App\Models\visit;
use App\Repositories\visitRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class visitRepositoryTest extends TestCase
{
    use MakevisitTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var visitRepository
     */
    protected $visitRepo;

    public function setUp()
    {
        parent::setUp();
        $this->visitRepo = App::make(visitRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatevisit()
    {
        $visit = $this->fakevisitData();
        $createdvisit = $this->visitRepo->create($visit);
        $createdvisit = $createdvisit->toArray();
        $this->assertArrayHasKey('id', $createdvisit);
        $this->assertNotNull($createdvisit['id'], 'Created visit must have id specified');
        $this->assertNotNull(visit::find($createdvisit['id']), 'visit with given id must be in DB');
        $this->assertModelData($visit, $createdvisit);
    }

    /**
     * @test read
     */
    public function testReadvisit()
    {
        $visit = $this->makevisit();
        $dbvisit = $this->visitRepo->find($visit->id);
        $dbvisit = $dbvisit->toArray();
        $this->assertModelData($visit->toArray(), $dbvisit);
    }

    /**
     * @test update
     */
    public function testUpdatevisit()
    {
        $visit = $this->makevisit();
        $fakevisit = $this->fakevisitData();
        $updatedvisit = $this->visitRepo->update($fakevisit, $visit->id);
        $this->assertModelData($fakevisit, $updatedvisit->toArray());
        $dbvisit = $this->visitRepo->find($visit->id);
        $this->assertModelData($fakevisit, $dbvisit->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletevisit()
    {
        $visit = $this->makevisit();
        $resp = $this->visitRepo->delete($visit->id);
        $this->assertTrue($resp);
        $this->assertNull(visit::find($visit->id), 'visit should not exist in DB');
    }
}
