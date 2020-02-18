<?php

namespace App\Http\Controllers;
use App\Item;
use App\Order;
use Illuminate\Http\Request;
use DB;
use PDF;

class Orders2019Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::connection('mysql2')->table('orders')->whereYear('created_at', '=', 2019)->orderby('id', 'desc')->paginate(20);
        return view('orders2019.index')->with('orders',$orders);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order2019  $order2019
     * @return \Illuminate\Http\Response
     */
   // public function show(Order2019 $order2019)

    public function show($id)
    {
        //$order = Order::find($id);
        $order = DB::connection('mysql2')->table('orders')->find($id);
        //$items = Item::find($id);
        $items = DB::connection('mysql2')
        ->table('items')
        ->where('order_id','=', $order->id)->get();

        $url = $order->id;


        $zavod = DB::connection('mysql2')
                ->table('orders')
                ->join('departments','orders.zavod','=','departments.id')
                ->where('orders.id','=',$url)
                ->select('departments.odjel')
                ->get(); 

        $nacin_plac = DB::connection('mysql2')->table('orders') 
                      ->join('payments','orders.nacin_placanja','=','payments.id')
                      ->where('orders.id','=',$url)
                      ->select('payments.nacin_placanja')
                      ->get();

        $kolicina_sum = DB::connection('mysql2')
        ->table('items')
        ->where('order_id','=', $order->id)
        ->sum('kolicina');

        $bezPDV_sum = DB::connection('mysql2')->table('items')->where('order_id','=', $order->id)->sum('cijena_bez_pdv');
        $iznos5x4_sum = DB::connection('mysql2')->table('items')->where('order_id','=', $order->id)->sum('iznos5x4');
        $pdv_iznos_sum = DB::connection('mysql2')->table('items')->where('order_id','=', $order->id)->sum('pdv_iznos');
        $ukupno_sum = DB::connection('mysql2')->table('items')->where('order_id','=', $order->id)->sum('ukupno');

        return view('orders2019.show')
        ->with('order',$order)
        ->with('items',$items)
        ->with('zavod',$zavod)->with('nacin_plac',$nacin_plac)
        ->with('kolicina_sum',$kolicina_sum)
        ->with('bezPDV_sum',$bezPDV_sum)
        ->with('iznos5x4_sum',$iznos5x4_sum)
        ->with('pdv_iznos_sum',$pdv_iznos_sum)
        ->with('ukupno_sum',$ukupno_sum);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order2019  $order2019
     * @return \Illuminate\Http\Response
     */
    public function edit(Order2019 $order2019)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order2019  $order2019
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order2019 $order2019)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order2019  $order2019
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order2019 $order2019)
    {
        //
    }

    public function generatePDF($id)

    {

  $orders = DB::connection('mysql2')->table('orders')->find($id);

  $items = DB::connection('mysql2')
  ->table('items')
  ->where('order_id','=', $orders->id)->get();

  $url = $orders->id;


  $zavod = DB::connection('mysql2')->table('orders')
          ->join('departments','orders.zavod','=','departments.id')
          ->where('orders.id','=',$url)
          ->select('departments.odjel')
          ->get(); 

  $nacin_plac = DB::connection('mysql2')->table('orders') 
                ->join('payments','orders.nacin_placanja','=','payments.id')
                ->where('orders.id','=',$url)
                ->select('payments.nacin_placanja')
                ->get();

  $kolicina_sum = DB::connection('mysql2')
  ->table('items')
  ->where('order_id','=', $orders->id)
  ->sum('kolicina');

  $bezPDV_sum = DB::connection('mysql2')->table('items')->where('order_id','=', $orders->id)->sum('cijena_bez_pdv');

  $iznos5x4_sum = DB::connection('mysql2')->table('items')->where('order_id','=', $orders->id)->sum('iznos5x4');

  $pdv_iznos_sum = DB::connection('mysql2')->table('items')->where('order_id','=', $orders->id)->sum('pdv_iznos');

  $ukupno_sum = DB::connection('mysql2')->table('items')->where('order_id','=', $orders->id)->sum('ukupno');

  $pdf = PDF::loadView('orders2019/ordersPDF',['orders'=>$orders] );

  return $pdf->download('Narudžbenica_br_'.$id.'_2019.pdf');
  
      
        
    }
}
