<?php

namespace App\Repositories;

use App\Models\locations;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class locationsRepository
 * @package App\Repositories
 * @version November 1, 2017, 11:14 am UTC
 *
 * @method locations findWithoutFail($id, $columns = ['*'])
 * @method locations find($id, $columns = ['*'])
 * @method locations first($columns = ['*'])
*/
class locationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'phone',
        'latitude',
        'longitude',
        'city_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return locations::class;
    }
}
