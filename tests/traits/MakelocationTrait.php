<?php

use Faker\Factory as Faker;
use App\Models\location;
use App\Repositories\locationRepository;

trait MakelocationTrait
{
    /**
     * Create fake instance of location and save it in database
     *
     * @param array $locationFields
     * @return location
     */
    public function makelocation($locationFields = [])
    {
        /** @var locationRepository $locationRepo */
        $locationRepo = App::make(locationRepository::class);
        $theme = $this->fakelocationData($locationFields);
        return $locationRepo->create($theme);
    }

    /**
     * Get fake instance of location
     *
     * @param array $locationFields
     * @return location
     */
    public function fakelocation($locationFields = [])
    {
        return new location($this->fakelocationData($locationFields));
    }

    /**
     * Get fake data of location
     *
     * @param array $postFields
     * @return array
     */
    public function fakelocationData($locationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'address' => $fake->word,
            'phone' => $fake->word,
            'latitude' => $fake->word,
            'longitude' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $locationFields);
    }
}
