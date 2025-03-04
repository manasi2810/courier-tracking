<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pincode;
use App\Models\booking;
use Auth;
use Session;
use DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
class bulkreportcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datas = Pincode::orderBy('id', 'DESC')->get();
        //  return view('admin.bulkreport.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function bulkreport()
    // {
    //     $datas = booking::where('forwordingno', '=', $['forwordingno'])->get();
        
    // }
    public function bulkreport(Request $request)
    {
        $forwordingno = preg_replace('/\s+/', '', $request->forwordingno);
        $split = explode(",", $forwordingno);
        $datas = booking::whereIn('forwordingno',  $split)->get();
        return view('admin/booking/Bulkinvoice', compact('datas'));  
    }
    public function bulksticker(Request $request)
    {
        $forwordingno = preg_replace('/\s+/', '', $request->forwordingno);
        $split = explode(",", $forwordingno);
        $datas = booking::whereIn('forwordingno',  $split)->get();
        return view('admin/booking/bulksticker', compact('datas'));  
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}