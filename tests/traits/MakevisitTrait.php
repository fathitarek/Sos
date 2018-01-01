<?php

use Faker\Factory as Faker;
use App\Models\visit;
use App\Repositories\visitRepository;

trait MakevisitTrait
{
    /**
     * Create fake instance of visit and save it in database
     *
     * @param array $visitFields
     * @return visit
     */
    public function makevisit($visitFields = [])
    {
        /** @var visitRepository $visitRepo */
        $visitRepo = App::make(visitRepository::class);
        $theme = $this->fakevisitData($visitFields);
        return $visitRepo->create($theme);
    }

    /**
     * Get fake instance of visit
     *
     * @param array $visitFields
     * @return visit
     */
    public function fakevisit($visitFields = [])
    {
        return new visit($this->fakevisitData($visitFields));
    }

    /**
     * Get fake data of visit
     *
     * @param array $postFields
     * @return array
     */
    public function fakevisitData($visitFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'patient_id' => $fake->randomDigitNotNull,
            'doctor_id' => $fake->randomDigitNotNull,
            'start_time' => $fake->word,
            'end_time' => $fake->word,
            'status' => $fake->randomDigitNotNull,
            'charage' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $visitFields);
    }
}
