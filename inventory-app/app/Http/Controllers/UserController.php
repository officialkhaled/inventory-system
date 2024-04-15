<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Dashboard';
        $user = User::find(auth()->user()->id);

        return view('admin.dashboard',
        [
            'header_title' => $data['header_title'],
            'user' => $user
        ]);
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
