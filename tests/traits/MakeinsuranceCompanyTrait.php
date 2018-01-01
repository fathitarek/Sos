<?php

use Faker\Factory as Faker;
use App\Models\insuranceCompany;
use App\Repositories\insuranceCompanyRepository;

trait MakeinsuranceCompanyTrait
{
    /**
     * Create fake instance of insuranceCompany and save it in database
     *
     * @param array $insuranceCompanyFields
     * @return insuranceCompany
     */
    public function makeinsuranceCompany($insuranceCompanyFields = [])
    {
        /** @var insuranceCompanyRepository $insuranceCompanyRepo */
        $insuranceCompanyRepo = App::make(insuranceCompanyRepository::class);
        $theme = $this->fakeinsuranceCompanyData($insuranceCompanyFields);
        return $insuranceCompanyRepo->create($theme);
    }

    /**
     * Get fake instance of insuranceCompany
     *
     * @param array $insuranceCompanyFields
     * @return insuranceCompany
     */
    public function fakeinsuranceCompany($insuranceCompanyFields = [])
    {
        return new insuranceCompany($this->fakeinsuranceCompanyData($insuranceCompanyFields));
    }

    /**
     * Get fake data of insuranceCompany
     *
     * @param array $postFields
     * @return array
     */
    public function fakeinsuranceCompanyData($insuranceCompanyFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'address' => $fake->word,
            'email' => $fake->word,
            'contact_person' => $fake->word,
            'mobile' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $insuranceCompanyFields);
    }
}
