<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;
use App\Profile;

class UserController extends Controller
{
    public function index() {
        return UserResource::collection(User::all());
    }

    public function show(User $user) {
        return new UserResource($user);
    }
}
