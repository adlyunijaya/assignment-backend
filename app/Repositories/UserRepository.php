<?php

namespace App\Repositories;

use App\Interfaces\UserInterfaces;
use App\Services\User\GetAllService;
use App\Services\User\LoginService;
use App\Services\User\RegisterService;

class UserRepository implements UserInterfaces {

    protected $registerService, $loginService, $getAllService;

    public function __construct(RegisterService $registerService, LoginService $loginService, GetAllService $getAllService)
    {
        $this->registerService = $registerService;
        $this->loginService = $loginService;
        $this->getAllService = $getAllService;
    }

    public function login($request)
    {
        $result = $this->loginService->login($request);

        return $result;
    }

    public function register($request)
    {
        $result = $this->registerService->register($request);

        return $result;
    }

    public function getAll()
    {
        $result = $this->getAllService->getAll();

        return $result;
    }
}