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
        $data['header_title'] = 'Add | Seller List';
        $user = User::find(auth()->user()->id);

        return view('admin.seller.create',
        [
            'header_title' => $data['header_title'],
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

    public function delete(User $user)
    {
        try {
            $user->delete();

            return redirect()->route('admin.seller.index')
                ->with('success', 'Seller deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.seller.index')
                ->with('error', 'Failed to delete the seller: ' . $e->getMessage());
        }
    }
}
