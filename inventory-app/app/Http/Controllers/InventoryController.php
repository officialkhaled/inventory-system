<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Inventory List';

        $inventories = Inventory::all();
        $user = User::find(auth()->user()->id);

        return view('admin.inventory.inventory-list',
        [
            'header_title' => $data['header_title'],
            'user' => $user,
            'inventories' => $inventories
        ]);
    }

    public function create()
    {
        $user = User::find(auth()->user()->id);

        return view('admin.inventory.create',
        [
            'user' => $user
        ]);
    }

    public function store(Request $request, Inventory $inventory)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try {
            $inventory->fill($validatedData)->save();
            return redirect()->route('admin.inventory.index')->with('success', 'Inventory added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.', 500);
        }

        return redirect()->route('admin.inventory.index');
    }

    public function edit($inventory)
    {
        $user = User::find(auth()->user()->id);
        $inventory = Inventory::where('id', $inventory)->get()->first();

        return view('admin.inventory.edit',
        [
            'user' => $user,
            'inventory' => $inventory
        ]);
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $inventory->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('admin.inventory.index');
    }

    public function delete($inventory)
    {
        $inventory = Inventory::where('id', $inventory)->get()->first();
        $inventory->delete();

        return redirect()->route('admin.inventory.index');
    }
}
