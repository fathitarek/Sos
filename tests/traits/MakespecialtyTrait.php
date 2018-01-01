<?php

use Faker\Factory as Faker;
use App\Models\specialty;
use App\Repositories\specialtyRepository;

trait MakespecialtyTrait
{
    /**
     * Create fake instance of specialty and save it in database
     *
     * @param array $specialtyFields
     * @return specialty
     */
    public function makespecialty($specialtyFields = [])
    {
        /** @var specialtyRepository $specialtyRepo */
        $specialtyRepo = App::make(specialtyRepository::class);
        $theme = $this->fakespecialtyData($specialtyFields);
        return $specialtyRepo->create($theme);
    }

    /**
     * Get fake instance of specialty
     *
     * @param array $specialtyFields
     * @return specialty
     */
    public function fakespecialty($specialtyFields = [])
    {
        return new specialty($this->fakespecialtyData($specialtyFields));
    }

    /**
     * Get fake data of specialty
     *
     * @param array $postFields
     * @return array
     */
    public function fakespecialtyData($specialtyFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name_en' => $fake->word,
            'name_ar' => $fake->word,
            'published' => $fake->word,
            'approved' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $specialtyFields);
    }
}
