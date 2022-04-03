<?php

namespace App\Services;


use App\Repositories\DeveloperRepository;
use Illuminate\Support\Facades\Auth;

use App\Repositories\TaskRepository;

class DeveloperService
{
    const WEEKLY_MAX_WORK_HOURS = 45;

    /**
     * @var DeveloperRepository
     */
    protected $developerRepository;

    /**
     * @param DeveloperRepository $developerRepository
     */
    public function __construct(DeveloperRepository $developerRepository)
    {
        $this->developerRepository = $developerRepository;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->developerRepository->all();
    }


}
