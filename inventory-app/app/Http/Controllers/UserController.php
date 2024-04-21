<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Item;
use App\Models\Inventory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Dashboard';
        $user = User::find(auth()->user()->id);

        $inventory = Inventory::count();
        $item = Item::count();

        if ($user->usertype == 1) {
            return view('admin.dashboard',
            [
                'header_title' => $data['header_title'],
                'user' => $user,
                'inventory' => $inventory,
                'item' => $item
            ]);
        } else {
            return view('customer.dashboard',
            [
                'header_title' => $data['header_title'],
                'user' => $user,
                'inventory' => $inventory,
                'item' => $item
            ]);
        }

    }
}
