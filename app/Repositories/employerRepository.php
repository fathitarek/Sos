<?php

namespace App\Repositories;

use App\Models\employer;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class employerRepository
 * @package App\Repositories
 * @version November 6, 2017, 11:45 am UTC
 *
 * @method employer findWithoutFail($id, $columns = ['*'])
 * @method employer find($id, $columns = ['*'])
 * @method employer first($columns = ['*'])
*/
class employerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'email',
        'contact_person',
        'mobile',
        'published',
        'approved'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return employer::class;
    }
}
