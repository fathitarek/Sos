<?php

namespace App\Repositories;

use App\Models\role;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class roleRepository
 * @package App\Repositories
 * @version November 1, 2017, 2:56 pm UTC
 *
 * @method role findWithoutFail($id, $columns = ['*'])
 * @method role find($id, $columns = ['*'])
 * @method role first($columns = ['*'])
*/
class roleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'role',
        'description',
        'logo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return role::class;
    }
}
