<?php

use Faker\Factory as Faker;
use App\Models\employer;
use App\Repositories\employerRepository;

trait MakeemployerTrait
{
    /**
     * Create fake instance of employer and save it in database
     *
     * @param array $employerFields
     * @return employer
     */
    public function makeemployer($employerFields = [])
    {
        /** @var employerRepository $employerRepo */
        $employerRepo = App::make(employerRepository::class);
        $theme = $this->fakeemployerData($employerFields);
        return $employerRepo->create($theme);
    }

    /**
     * Get fake instance of employer
     *
     * @param array $employerFields
     * @return employer
     */
    public function fakeemployer($employerFields = [])
    {
        return new employer($this->fakeemployerData($employerFields));
    }

    /**
     * Get fake data of employer
     *
     * @param array $postFields
     * @return array
     */
    public function fakeemployerData($employerFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'address' => $fake->word,
            'email' => $fake->word,
            'contact_person' => $fake->word,
            'mobile' => $fake->word,
            'published' => $fake->word,
            'approved' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $employerFields);
    }
}
