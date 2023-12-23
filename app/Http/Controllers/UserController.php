<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function getUsers()
    {
        $limit = request('limit', 15);
        $users = User::paginate($limit);
        return $this->success($users);
    }

    public function getUser()
    {
    }
}
