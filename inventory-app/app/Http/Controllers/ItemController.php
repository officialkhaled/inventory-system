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
    
    public function store(Inventory $inventory, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer',
        ]);
        
        if ($request->file('img_path')) {
            $file = $request->file('img_path');
            $fileName = date('YmdHi-') . $file->getClientOriginalName();
            
            $destinationPath = public_path('assets/images/uploads');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            
            $file->move($destinationPath, $fileName);
            $validatedData['img_path'] = 'assets/images/uploads/' . $fileName;
        }
        
        try {
            $item = new Item($validatedData);
            $inventory->items()->save($item);
            return redirect()->route('admin.inventory.item.index', ['inventory' => $inventory->id])
                ->with('success', 'Item added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.', 500);
        }
    }
    
    public function edit(Inventory $inventory, Item $item)
    {
        $data['header_title'] = 'Edit | Item List';
        $user = User::find(auth()->user()->id);
        
        return view('admin.item.edit',
            [
                'header_title' => $data['header_title'],
                'user' => $user,
                'inventory' => $inventory,
                'item' => $item
            ]);
    }
    
    public function update(Inventory $inventory, Item $item, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer',
        ]);
        
        if ($request->hasFile('img_path')) {
            $file = $request->file('img_path');
            $fileName = date('YmdHi') . '-' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/images/uploads');
            $file->move($destinationPath, $fileName);
            $validatedData['img_path'] = 'assets/images/uploads/' . $fileName;
//            File::delete(public_path($item->img_path));
        }
        
        try {
            $item->update($validatedData);
            return redirect()->route('admin.inventory.item.index', ['inventory' => $inventory->id])
                ->with('success', 'Item updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update the item: ' . $e->getMessage());
        }
    }
    
    public function delete(Inventory $inventory, Item $item)
    {
        try {
            $item->delete();
            
            return redirect()->route('admin.inventory.item.index', ['inventory' => $inventory->id])
                ->with('success', 'Item deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.inventory.item.index', ['inventory' => $inventory->id])
                ->with('error', 'Failed to delete the item: ' . $e->getMessage());
        }
    }
}
