<?php

use App\Models\menuItems;
use App\Repositories\menuItemsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class menuItemsRepositoryTest extends TestCase
{
    use MakemenuItemsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var menuItemsRepository
     */
    protected $menuItemsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->menuItemsRepo = App::make(menuItemsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatemenuItems()
    {
        $menuItems = $this->fakemenuItemsData();
        $createdmenuItems = $this->menuItemsRepo->create($menuItems);
        $createdmenuItems = $createdmenuItems->toArray();
        $this->assertArrayHasKey('id', $createdmenuItems);
        $this->assertNotNull($createdmenuItems['id'], 'Created menuItems must have id specified');
        $this->assertNotNull(menuItems::find($createdmenuItems['id']), 'menuItems with given id must be in DB');
        $this->assertModelData($menuItems, $createdmenuItems);
    }

    /**
     * @test read
     */
    public function testReadmenuItems()
    {
        $menuItems = $this->makemenuItems();
        $dbmenuItems = $this->menuItemsRepo->find($menuItems->id);
        $dbmenuItems = $dbmenuItems->toArray();
        $this->assertModelData($menuItems->toArray(), $dbmenuItems);
    }

    /**
     * @test update
     */
    public function testUpdatemenuItems()
    {
        $menuItems = $this->makemenuItems();
        $fakemenuItems = $this->fakemenuItemsData();
        $updatedmenuItems = $this->menuItemsRepo->update($fakemenuItems, $menuItems->id);
        $this->assertModelData($fakemenuItems, $updatedmenuItems->toArray());
        $dbmenuItems = $this->menuItemsRepo->find($menuItems->id);
        $this->assertModelData($fakemenuItems, $dbmenuItems->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletemenuItems()
    {
        $menuItems = $this->makemenuItems();
        $resp = $this->menuItemsRepo->delete($menuItems->id);
        $this->assertTrue($resp);
        $this->assertNull(menuItems::find($menuItems->id), 'menuItems should not exist in DB');
    }
}
