<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);

        return view('admin.item.item-list',
        [
            'items' => $user->items
        ]);
    }

    public function create()
    {
        return view('admin.item.create');
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
