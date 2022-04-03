<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    /**
     * @var TaskRepository
     */
    protected $taskRepository;

    /**
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @param $title
     * @param $duration
     * @param $difficulty
     * @return mixed
     */
    public function createTask($title, $duration, $difficulty)
    {
        return $this->taskRepository->save($title, $duration, $difficulty);
    }

    /**
     * @param $title
     * @return mixed
     */
    public function findByTitle($title)
    {
        return $this->taskRepository->findByTitle($title);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->taskRepository->all();
    }


}
