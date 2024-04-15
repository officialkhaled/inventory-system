<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Seller List';
        $user = User::find(auth()->user()->id);
        $sellers = $user->where('usertype', 0)->get();

        return view('admin.seller.seller-list',
        [
            'header_title' => $data['header_title'],
            'user' => $user,
            'sellers' => $sellers
        ]);
    }

    public function create()
    {
        $user = User::find(auth()->user()->id);

        return view('admin.seller.create',
        [
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'store' => 'required',
            'usertype' => 'required'
        ]);

        $user = User::create($validatedData);

        return redirect()->route('admin.seller.index');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete($id)
    {
        $id = User::find($id)->first()->delete();

        return redirect()->route('admin.seller.index');
    }
}
