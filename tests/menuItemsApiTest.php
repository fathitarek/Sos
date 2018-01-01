<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class menuItemsApiTest extends TestCase
{
    use MakemenuItemsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatemenuItems()
    {
        $menuItems = $this->fakemenuItemsData();
        $this->json('POST', '/api/v1/menuItems', $menuItems);

        $this->assertApiResponse($menuItems);
    }

    /**
     * @test
     */
    public function testReadmenuItems()
    {
        $menuItems = $this->makemenuItems();
        $this->json('GET', '/api/v1/menuItems/'.$menuItems->id);

        $this->assertApiResponse($menuItems->toArray());
    }

    /**
     * @test
     */
    public function testUpdatemenuItems()
    {
        $menuItems = $this->makemenuItems();
        $editedmenuItems = $this->fakemenuItemsData();

        $this->json('PUT', '/api/v1/menuItems/'.$menuItems->id, $editedmenuItems);

        $this->assertApiResponse($editedmenuItems);
    }

    /**
     * @test
     */
    public function testDeletemenuItems()
    {
        $menuItems = $this->makemenuItems();
        $this->json('DELETE', '/api/v1/menuItems/'.$menuItems->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/menuItems/'.$menuItems->id);

        $this->assertResponseStatus(404);
    }
}
