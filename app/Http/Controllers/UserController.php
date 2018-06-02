<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Http\Resources\UserResource;
use App\Http\Resources\UsersCollection;

class UserController extends Controller
{
    public function index(){
        return new UsersCollection(User::paginate(10));
    }

    public function search(Request $req){
        return new UsersCollection(User::where('name','LIKE','%' . $req->value . '%')->paginate(10));
    }
}
