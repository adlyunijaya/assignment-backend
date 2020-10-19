<?php

namespace App\Interfaces;

interface UserInterfaces {

    public function login($request);

    public function register($request);

    public function getAll();
}