<?php

namespace App\Services;

use App\Interfaces\ProviderInterface;

class ProviderService
{

    /**
     * @var ProviderInterface
     */
    public $provider;

    /**
     * @param ProviderInterface $provider
     */
    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function getTasks()
    {
        return $this->provider->getTasks();
    }
}
