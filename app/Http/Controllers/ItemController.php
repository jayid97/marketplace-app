<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ItemController extends Controller
{
    //
    public function list(Request $request)
    {
        $query = Item::query();
        if($request->search)
        {
            $query->where(function($q) use ($request){
                $q->where('name', 'LIKE', "%". $request->search. "%");
            });
        }
        $items = $query->orderBy('created_at')->where('status', '!=', 'Paid')->paginate(15);
        return view('welcome', compact('items'));
    }

    public function view($id)
    {
        $items = Item::findOrFail($id);
        $seller = Rating::where('seller_id', $items->user_id)->get();
        $total_star = 0;
        $avg_star = 0;

        foreach($seller as $s)
        {
           $total_star += $s->star;
           $avg_star = $total_star / count($seller);
        }

        $count_item = Item::where('user_id', $items->user_id)->count();

        return view('items', compact('items', 'avg_star', 'count_item'));
    }
}
