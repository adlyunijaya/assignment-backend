<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Interfaces\UserInterfaces;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userInterface;

    public function __construct(UserInterfaces $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function login(Request $request)
    {

        $result = $this->userInterface->login($request);

        return $result;
    }

    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();

        $result = $this->userInterface->register($request);

        return $result;
    }

    public function getAll()
    {
        $result = $this->userInterface->getAll();

        return $result;
    }
}
