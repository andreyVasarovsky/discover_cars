<?php


namespace App\Http\Controllers\File;

use App\Services\File\Service;

class BaseController
{
    public Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
