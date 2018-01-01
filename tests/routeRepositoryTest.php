<?php

use App\Models\route;
use App\Repositories\routeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class routeRepositoryTest extends TestCase
{
    use MakerouteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var routeRepository
     */
    protected $routeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->routeRepo = App::make(routeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateroute()
    {
        $route = $this->fakerouteData();
        $createdroute = $this->routeRepo->create($route);
        $createdroute = $createdroute->toArray();
        $this->assertArrayHasKey('id', $createdroute);
        $this->assertNotNull($createdroute['id'], 'Created route must have id specified');
        $this->assertNotNull(route::find($createdroute['id']), 'route with given id must be in DB');
        $this->assertModelData($route, $createdroute);
    }

    /**
     * @test read
     */
    public function testReadroute()
    {
        $route = $this->makeroute();
        $dbroute = $this->routeRepo->find($route->id);
        $dbroute = $dbroute->toArray();
        $this->assertModelData($route->toArray(), $dbroute);
    }

    /**
     * @test update
     */
    public function testUpdateroute()
    {
        $route = $this->makeroute();
        $fakeroute = $this->fakerouteData();
        $updatedroute = $this->routeRepo->update($fakeroute, $route->id);
        $this->assertModelData($fakeroute, $updatedroute->toArray());
        $dbroute = $this->routeRepo->find($route->id);
        $this->assertModelData($fakeroute, $dbroute->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteroute()
    {
        $route = $this->makeroute();
        $resp = $this->routeRepo->delete($route->id);
        $this->assertTrue($resp);
        $this->assertNull(route::find($route->id), 'route should not exist in DB');
    }
}
