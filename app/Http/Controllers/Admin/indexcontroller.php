<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\Pincode;
use db;

class indexcontroller extends Controller
{
    public function dashboard()
    {   

        // $data= array();
        $data['Total'] = booking::orderBy('id', 'DESC')->count();
        $data['Shipped'] = booking::where('status', '=', 'Shipped')->count();
        $data['outfordeliverd'] = booking::where('status', '=', 'Out For Deliver')->count();
        $data['deliverd'] = booking::where('status', '=', 'Delivered')->count();
        $data['intransit'] = booking::where('status', '=', 'Intransit')->count();
        $data['rto'] = booking::where('status', '=', 'RTO')->count();
        $data['Totalpincode'] = Pincode::count();
        $data['tat1'] = booking::whereIn('status', ['Intransit', 'Shipped', 'Out For Deliver'])
    ->whereBetween('created_at', [now()->subDays(5), now()->subDays(3)])
    ->count();
     $data['tat2'] = booking::whereIn('status', ['Intransit', 'Shipped', 'Out For Deliver'])
    ->whereBetween('created_at', [now()->subDays(10), now()->subDays(5)])
    ->count();
     $data['tat3'] = booking::whereIn('status', ['Intransit', 'Shipped', 'Out For Deliver'])
    ->whereBetween('created_at', [now()->subDays(500), now()->subDays(10)])
    ->count();
        return view('admin/dashboard',compact('data'));
    }
}
