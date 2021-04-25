<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use App\Services\PostAPIService;

trait CreatesApplication
{

    protected $service;
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        $this->service = new PostAPIService();

        return $app;
    }
}
