<?php

namespace App\Repositories;

use App\Models\specialty;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class specialtyRepository
 * @package App\Repositories
 * @version November 6, 2017, 11:10 am UTC
 *
 * @method specialty findWithoutFail($id, $columns = ['*'])
 * @method specialty find($id, $columns = ['*'])
 * @method specialty first($columns = ['*'])
*/
class specialtyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_en',
        'name_ar',
        'published',
        'approved'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return specialty::class;
    }
}
