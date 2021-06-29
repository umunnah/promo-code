<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository 
{
    public function __construct(User $model, Request $request)
    {
        parent::__construct($model, $request);
    }

    public function save(array $data): User 
    {
        $password = $data['password'];
        $data['password'] = Hash::make($password);
        return $this->create($data);
    }
}