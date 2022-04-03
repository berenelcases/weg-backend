<?php

namespace App\Http\Controllers;

use App\Services\DeveloperService;
use App\Services\TaskService;

class TodoController extends Controller
{
    /**
     * @var TaskService
     */
    protected $taskService, $developerService;

    /**
     * @param TaskService $taskService
     * @param DeveloperService $developerService
     */
    public function __construct(TaskService $taskService, DeveloperService $developerService)
    {
        $this->taskService = $taskService;
        $this->developerService = $developerService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function calculate()
    {
        $tasks = $this->taskService->all();
        $developers = $this->developerService->all();

        $totalDuration = 0;
        foreach ($tasks as $task) {
            $totalDuration += $task->duration;
        }

        $singleManPower = $this->developerService::WEEKLY_MAX_WORK_HOURS;
        $totalWeek = ceil($totalDuration / ($singleManPower * count($developers)));
        $todoList = [];

        for ($currentWeek = 1; $currentWeek <= $totalWeek; $currentWeek++) {
            foreach ($developers as $developer) {
                $totalWorkHours = 0;
                foreach ($tasks as $key => $task) {
                    if ($task->difficulty > $developer->level) {
                        continue;
                    }
                    if ($totalWorkHours + $task->duration <= $singleManPower) {
                        $totalWorkHours += $task->duration;
                        $todoList[$currentWeek][$developer->name][] = $task;
                        unset($tasks[$key]);
                    }
                }
            }
        }
        return view('calculate', ['todoList' => $todoList]);
    }


}
