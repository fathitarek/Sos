<?php

namespace App\Repositories;

use App\Models\region;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class regionRepository
 * @package App\Repositories
 * @version November 1, 2017, 6:32 am UTC
 *
 * @method region findWithoutFail($id, $columns = ['*'])
 * @method region find($id, $columns = ['*'])
 * @method region first($columns = ['*'])
*/
class regionRepository extends BaseRepository
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
        return region::class;
    }
}
