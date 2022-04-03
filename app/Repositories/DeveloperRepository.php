<?php

namespace App\Repositories;

use App\Models\Developer;

class DeveloperRepository
{
    const WEEKLY_MAX_WORK_HOURS = 45;

    /**
     * @var Developer
     */
    protected $developer;


    /**
     * @param Developer $developer
     */
    public function __construct(Developer $developer)
    {
        $this->developer = $developer;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->developer->orderBy('level','asc')->get();
    }

}
