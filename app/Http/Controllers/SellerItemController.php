<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::where('user_id', Auth::user()->id)->paginate(5);
        return view('seller.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'price' => 'required',
            'image_name' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('image_name')) {
            $destination_path = 'public/images/items';
            $image = $request->file('image_name');
            $image_name = $image->getClientOriginalName();
            $request->file('image_name')->storeAs($destination_path, $image_name);

        }

        Item::create([
            'name' => $request->name,
            'location' => $request->location,
            'price' => $request->price,
            'image_name' => $image->getClientOriginalName(),
            'description' => $request->description,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->withStatus('Add New Service Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('seller.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item->update(['name' => $request->name,
            'location' => $request->location,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        return redirect()->route('items.index')->withStatus('Update Success!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->destroy($item->id);
        return redirect()->route('items.index')->withStatus('Delete Success!');
    }
}
