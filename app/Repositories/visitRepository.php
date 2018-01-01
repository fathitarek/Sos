<?php

namespace App\Repositories;

use App\Models\visit;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class visitRepository
 * @package App\Repositories
 * @version November 26, 2017, 2:21 pm UTC
 *
 * @method visit findWithoutFail($id, $columns = ['*'])
 * @method visit find($id, $columns = ['*'])
 * @method visit first($columns = ['*'])
*/
class visitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'patient_id',
        'doctor_id',
        'start_time',
        'end_time',
        'status',
        'charage'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return visit::class;
    }
}
