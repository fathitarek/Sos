<?php

namespace App\Repositories;

use App\Models\insuranceCompany;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class insuranceCompanyRepository
 * @package App\Repositories
 * @version November 6, 2017, 1:13 pm UTC
 *
 * @method insuranceCompany findWithoutFail($id, $columns = ['*'])
 * @method insuranceCompany find($id, $columns = ['*'])
 * @method insuranceCompany first($columns = ['*'])
*/
class insuranceCompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'email',
        'contact_person',
        'mobile'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return insuranceCompany::class;
    }
}
