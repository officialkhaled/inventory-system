<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Inventory;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Inventory $inventory)
    {
        $data['header_title'] = 'Item List';

        $inventory->load('items');
        $user = User::find(auth()->user()->id);

        return view('admin.item.item-list',
        [
            'header_title' => $data['header_title'],
            'user' => $user,
            'inventory' => $inventory
        ]);
    }

    public function create(Inventory $inventory, Request $request)
    {
        $data['header_title'] = 'Add | Item List';

        $user = User::find(auth()->user()->id);

        return view('admin.item.create',
        [
            'header_title' => $data['header_title'],
            'user' => $user,
            'inventory' => $inventory
        ]);
    }

    public function store(Item $item, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required',
        ]);
        
        if ($request->file('img_path')) {
            $file = $request->file('img_path');
            $fileName = date('YmdHi-').$file->getClientOriginalName();
            
            $file->move(public_path('images/uploads/', $fileName));
            $validatedData['img_path'] = $fileName;
        }

        try {
            $item->fill($validatedData)->save();
            return redirect()->route('admin.inventory.item.index')->with('success', 'Item added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.', 500);
        }

//        return redirect()->route('admin.inventory.item.index');
    }

    public function edit(Inventory $inventory, Item $item)
    {
        return view('admin.item.edit',
        [
            'inventory' => $inventory,
            'item' => $item
        ]);
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
