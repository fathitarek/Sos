<?php

use Faker\Factory as Faker;
use App\Models\menuItems;
use App\Repositories\menuItemsRepository;

trait MakemenuItemsTrait
{
    /**
     * Create fake instance of menuItems and save it in database
     *
     * @param array $menuItemsFields
     * @return menuItems
     */
    public function makemenuItems($menuItemsFields = [])
    {
        /** @var menuItemsRepository $menuItemsRepo */
        $menuItemsRepo = App::make(menuItemsRepository::class);
        $theme = $this->fakemenuItemsData($menuItemsFields);
        return $menuItemsRepo->create($theme);
    }

    /**
     * Get fake instance of menuItems
     *
     * @param array $menuItemsFields
     * @return menuItems
     */
    public function fakemenuItems($menuItemsFields = [])
    {
        return new menuItems($this->fakemenuItemsData($menuItemsFields));
    }

    /**
     * Get fake data of menuItems
     *
     * @param array $postFields
     * @return array
     */
    public function fakemenuItemsData($menuItemsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'display_name' => $fake->word,
            'url' => $fake->word,
            'menu_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $menuItemsFields);
    }
}
