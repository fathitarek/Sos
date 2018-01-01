<?php

use Faker\Factory as Faker;
use App\Models\route;
use App\Repositories\routeRepository;

trait MakerouteTrait
{
    /**
     * Create fake instance of route and save it in database
     *
     * @param array $routeFields
     * @return route
     */
    public function makeroute($routeFields = [])
    {
        /** @var routeRepository $routeRepo */
        $routeRepo = App::make(routeRepository::class);
        $theme = $this->fakerouteData($routeFields);
        return $routeRepo->create($theme);
    }

    /**
     * Get fake instance of route
     *
     * @param array $routeFields
     * @return route
     */
    public function fakeroute($routeFields = [])
    {
        return new route($this->fakerouteData($routeFields));
    }

    /**
     * Get fake data of route
     *
     * @param array $postFields
     * @return array
     */
    public function fakerouteData($routeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'route' => $fake->word,
            'role_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $routeFields);
    }
}
