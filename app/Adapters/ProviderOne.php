<?php

namespace App\Adapters;

use App\Interfaces\ProviderInterface;
use Illuminate\Support\Facades\Http;
use Nette\Utils\Json;

class ProviderOne implements ProviderInterface
{
    /**
     * @return array
     * @throws \Exception
     */
    public function getTasks()
    {
        try {
            $response = Http::get("http://www.mocky.io/v2/5d47f24c330000623fa3ebfa");
            $tasks = Json::decode($response->body());

            $tasksArray = [];
            foreach ($tasks as $task) {
                $tasksArray[] = [
                    'title' => $task->id,
                    'duration' => $task->sure,
                    'difficulty' => $task->zorluk
                ];
            }
            return $tasksArray;
        } catch (\Exception $e) {
            throw new \Exception('API bağlantısı kurulamadı.');
        }
    }
}
