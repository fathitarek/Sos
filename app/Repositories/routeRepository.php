<?php

namespace App\Repositories;

use App\Models\route;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class routeRepository
 * @package App\Repositories
 * @version November 1, 2017, 3:03 pm UTC
 *
 * @method route findWithoutFail($id, $columns = ['*'])
 * @method route find($id, $columns = ['*'])
 * @method route first($columns = ['*'])
*/
class routeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'route'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return route::class;
    }
}
