<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;

class Users extends Controller
{
    public function show($id) {
        if (!$id) {
            return User::orderBy('name', 'asc')->get();
        } else {
            return User::find($id);
        }
    }
}
