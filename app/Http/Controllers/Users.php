<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;

class Users extends Controller
{
    public function showAll()
    {
        $users = User::orderBy('name', 'asc')->get();
        if ($users) {
            return $users;
        } else {
            return response()->json(['error' => 'No users have been registered']);
        }
    }

    public function show($id)
    {
        if (!User::find($id)) {
            return response()->json(['error' => 'User ID doesnt exist']);
        } else {
            return User::find($id);
        }
    }
}
