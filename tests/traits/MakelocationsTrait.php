<?php

use Faker\Factory as Faker;
use App\Models\locations;
use App\Repositories\locationsRepository;

trait MakelocationsTrait
{
    /**
     * Create fake instance of locations and save it in database
     *
     * @param array $locationsFields
     * @return locations
     */
    public function makelocations($locationsFields = [])
    {
        /** @var locationsRepository $locationsRepo */
        $locationsRepo = App::make(locationsRepository::class);
        $theme = $this->fakelocationsData($locationsFields);
        return $locationsRepo->create($theme);
    }

    /**
     * Get fake instance of locations
     *
     * @param array $locationsFields
     * @return locations
     */
    public function fakelocations($locationsFields = [])
    {
        return new locations($this->fakelocationsData($locationsFields));
    }

    /**
     * Get fake data of locations
     *
     * @param array $postFields
     * @return array
     */
    public function fakelocationsData($locationsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'address' => $fake->word,
            'phone' => $fake->word,
            'latitude' => $fake->word,
            'longitude' => $fake->word,
            'city_id' => $fake->word,
            'region_id' => $fake->randomDigitNotNull,
            'patient_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $locationsFields);
    }
}
