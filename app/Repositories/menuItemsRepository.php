<?php

namespace App\Repositories;

use App\Models\menuItems;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class menuItemsRepository
 * @package App\Repositories
 * @version November 9, 2017, 7:09 am UTC
 *
 * @method menuItems findWithoutFail($id, $columns = ['*'])
 * @method menuItems find($id, $columns = ['*'])
 * @method menuItems first($columns = ['*'])
*/
class menuItemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'display_name',
        'url'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return menuItems::class;
    }
}
