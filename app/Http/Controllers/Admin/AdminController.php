<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function dashboard()
    {
        $dailysales = [];
        $lastmonth = \Carbon\Carbon::today()->subMonths(1);
        foreach(Item::where('created_at', '>=', $lastmonth)->orderBy('created_at', 'desc')->get() as $row)
        {
            $dt = $row->created_at->format('Y-m-d');
            
            if(isset($dailysales[$dt]))
            {
                $dailysales[$dt] += $row->price;
            }else{
                $dailysales[$dt] = $row->price;
            }
        }


        return view('admin.dashboard', compact('dailysales'));
    }
}
