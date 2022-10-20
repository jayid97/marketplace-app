<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function list()
    {
        $items = Item::where('status', '!=', 'Paid')->get();
        return view('welcome', compact('items'));
    }

    public function view($id)
    {
        $items = Item::findOrFail($id);
        return view('items', compact('items'));
    }
}
