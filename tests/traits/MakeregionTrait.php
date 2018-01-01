<?php

use Faker\Factory as Faker;
use App\Models\region;
use App\Repositories\regionRepository;

trait MakeregionTrait
{
    /**
     * Create fake instance of region and save it in database
     *
     * @param array $regionFields
     * @return region
     */
    public function makeregion($regionFields = [])
    {
        /** @var regionRepository $regionRepo */
        $regionRepo = App::make(regionRepository::class);
        $theme = $this->fakeregionData($regionFields);
        return $regionRepo->create($theme);
    }

    /**
     * Get fake instance of region
     *
     * @param array $regionFields
     * @return region
     */
    public function fakeregion($regionFields = [])
    {
        return new region($this->fakeregionData($regionFields));
    }

    /**
     * Get fake data of region
     *
     * @param array $postFields
     * @return array
     */
    public function fakeregionData($regionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'display_name_en' => $fake->word,
            'display_name_ar' => $fake->word,
            'city_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $regionFields);
    }
}
