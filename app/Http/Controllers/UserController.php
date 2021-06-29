<?php

namespace App\Http\Controllers;

use App\Http\Request\StoreUser;
use App\Http\Response\ApiResponse;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function store(StoreUser $request) 
    {
        $user = $this->userRepository->save($request->request->all());
        return ApiResponse::sendResponse($user, "successful", true,201);
    }
}
