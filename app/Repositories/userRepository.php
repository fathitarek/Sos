<?php

namespace App\Repositories;

use App\User;
use InfyOm\Generator\Common\BaseRepository;


class userRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
