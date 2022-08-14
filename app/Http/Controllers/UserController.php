<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
        return $request->fullUrl();
    }
    public function getDefaindexultUser() {
        $name = "Bruce it up!";
        $users = ['name'=>'BigWig', 'email'=>'bigwig@gmail.com', 'phone'=>'243234'];
        return view('user', compact('name', 'users'));
    }
}
