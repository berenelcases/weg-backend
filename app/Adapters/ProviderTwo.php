<?php

namespace App\Adapters;

use App\Interfaces\ProviderInterface;
use Illuminate\Support\Facades\Http;
use Nette\Utils\Json;

class ProviderTwo implements ProviderInterface
{
    /**
     * @return array
     * @throws \Exception
     */
    public function getTasks()
    {
        try {
            $response = Http::get("http://www.mocky.io/v2/5d47f235330000623fa3ebf7");
            $tasks = Json::decode($response->body());

            $tasksArray = [];
            foreach ($tasks as $task) {
                $tasksArray[] = [
                    'title' => key($task),
                    'duration' => current($task)->estimated_duration,
                    'difficulty' => current($task)->level
                ];
            }
            return $tasksArray;
        } catch (\Exception $e) {
            throw new \Exception('API bağlantısı kurulamadı.');
        }
    }
}
