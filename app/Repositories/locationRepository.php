<?php

namespace App\Repositories;

use App\Models\location;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class locationRepository
 * @package App\Repositories
 * @version November 1, 2017, 11:01 am UTC
 *
 * @method location findWithoutFail($id, $columns = ['*'])
 * @method location find($id, $columns = ['*'])
 * @method location first($columns = ['*'])
*/
class locationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'phone',
        'latitude',
        'longitude'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return location::class;
    }
}
