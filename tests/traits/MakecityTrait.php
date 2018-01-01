<?php

use Faker\Factory as Faker;
use App\Models\city;
use App\Repositories\cityRepository;

trait MakecityTrait
{
    /**
     * Create fake instance of city and save it in database
     *
     * @param array $cityFields
     * @return city
     */
    public function makecity($cityFields = [])
    {
        /** @var cityRepository $cityRepo */
        $cityRepo = App::make(cityRepository::class);
        $theme = $this->fakecityData($cityFields);
        return $cityRepo->create($theme);
    }

    /**
     * Get fake instance of city
     *
     * @param array $cityFields
     * @return city
     */
    public function fakecity($cityFields = [])
    {
        return new city($this->fakecityData($cityFields));
    }

    /**
     * Get fake data of city
     *
     * @param array $postFields
     * @return array
     */
    public function fakecityData($cityFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'display_name_en' => $fake->word,
            'display_name_ar' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $cityFields);
    }
}
