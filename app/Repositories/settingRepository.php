<?php

namespace App\Repositories;

use App\Models\setting;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class settingRepository
 * @package App\Repositories
 * @version November 8, 2017, 2:02 pm UTC
 *
 * @method setting findWithoutFail($id, $columns = ['*'])
 * @method setting find($id, $columns = ['*'])
 * @method setting first($columns = ['*'])
*/
class settingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'url',
        'logo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return setting::class;
    }
}
