<?php

namespace App\Repositories;

use App\Models\city;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class cityRepository
 * @package App\Repositories
 * @version October 31, 2017, 1:02 pm UTC
 *
 * @method city findWithoutFail($id, $columns = ['*'])
 * @method city find($id, $columns = ['*'])
 * @method city first($columns = ['*'])
*/
class cityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'display_name_en',
        'display_name_ar'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return city::class;
    }
}
