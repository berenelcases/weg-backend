<?php

namespace App\Console\Commands;

use App\Adapters\ProviderOne;
use App\Adapters\ProviderTwo;
use App\Services\ProviderService;
use App\Services\TaskService;
use Illuminate\Console\Command;

class getTasks extends Command
{

    protected $taskService;

    const PROVIDER_LIST = [
        ProviderOne::class,
        ProviderTwo::class
    ];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getTasks:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */


    public function __construct(TaskService $taskService)
    {
        parent::__construct();
        $this->taskService = $taskService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        foreach (self::PROVIDER_LIST as $provider) {
            $taskList = (new ProviderService(new $provider))->getTasks();
            foreach ($taskList as $task) {
                if ($this->taskService->findByTitle($task['title'])) {
                    continue;
                }
                $this->taskService->createTask($task['title'], $task['duration'], $task['difficulty']);
            }
        }
        return 0;
    }
}
