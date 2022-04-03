<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    /**
     * @var Task
     */
    protected $task;


    /**
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }


    /**
     * @param $title
     * @return mixed
     */
    public function findByTitle($title)
    {
        return $this->task
            ->where('title', $title)
            ->first();
    }

    /**
     * @param $title
     * @param $duration
     * @param $difficulty
     * @return mixed
     */
    public function save($title, $duration, $difficulty)
    {
        $row = new $this->task([
            'title' => $title,
            'duration' => $duration,
            'difficulty' => $difficulty,
        ]);
        $row->save();
        return $row->fresh();
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->task->all();
    }


}
