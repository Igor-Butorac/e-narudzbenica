<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $orders2019 = DB::connection('mysql2')
        ->table('orders')
        ->where('orders.user_id','=', $user_id)
        //->whereYear('created_at','=', 2019)
        ->get();

        return view('dashboard')
        ->with('orders',$user->orders)
        ->with('orders2019',$orders2019);

    }
}
