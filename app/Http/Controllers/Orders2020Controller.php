<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Item;
use App\Order;
use App\User;
use DB;
use PDF;

class Orders2020Controller extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $orders = DB::table('orders')->whereYear('created_at', '=', 2020)->orderby('id', 'desc')->paginate(20);
        return view('orders2020.index')->with('orders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zavod = DB::table('departments')->pluck('odjel');
        $zavod->prepend('Izaberite');
        $placanje = DB::table('payments')->pluck('nacin_placanja');
        $placanje->prepend('Izaberite');
        return view('orders2020.create')->with('zavod',$zavod)->with('placanje',$placanje);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[

            'naziv_prod' => 'required|min:1|max:135',
    
            'oib' => 'required',
        
            'zavod' => 'required',
    
            'sastavio' => 'required',
    
            'odobrio' => 'required',
    
    
        ],[
    
            'naziv_prod.required' => 'Naziv prodavatelja je obavezno polje',
    
            'oib.required' => 'OIB je obavezno polje',
    
            'zavod.required' => 'Zavod je obavezno polje',

            'min' => [
                'numeric' => ':Attribute je obavezno polje'],
    
            'sastavio.required' => 'Sastavio narudžbu je obavezno polje',
    
            'odobrio.required' => 'Odobrio narudžbu je obavezno polje',
        
        ]);
 


        $order = new Order;
        $order->naziv = $request->input('naziv');
        $order->rok_vazenja = $request->input('rok_vazenja');

        $order->nadnevak   = $request->input('nadnevak');
        $order->naziv_prod = $request->input('naziv_prod');
        $order->mjesto = $request->input('mjesto');
        $order->ulica_br = $request->input('ulica_br');
        $order->broj_tel = $request->input('broj_tel');
        $order->oib = $request->input('oib');
        $order->racun_prim = $request->input('racun_prim');
        $order->zavod = $request->input('zavod');
        //$order->naruc_dobra=$request->input('naruc_dobra');
        //$order->rok_isporuke=$request->input('rok_isporuke');
        //$order->nacin_otpreme=$request->input('nacin_otpreme');
        $order->user_id = auth()->user()->id;
        $order->rok = $request->input('rok');
        $order->nacin_placanja= $request->input('nacin_placanja');
        $order->sastavio = $request->input('sastavio');
        $order->odobrio  = $request->input('odobrio');
        $order->napomena  = $request->input('napomena');


        $order->save();

        return redirect('orders2020/'.$order->id)->with('success','Narudžbenica je kreirana!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $items = Item::find($id);
        
        $url = $order->id;

        $zavod = DB::table('orders')
                ->join('departments','orders.zavod','=','departments.id')
                ->where('orders.id','=',$url)
                ->select('departments.odjel')
                ->get(); 

        $nacin_plac = DB::table('orders') 
                      ->join('payments','orders.nacin_placanja','=','payments.id')
                      ->where('orders.id','=',$url)
                      ->select('payments.nacin_placanja')
                      ->get();

        $kolicina_sum = DB::table('items')->where('order_id','=', $order->id)->sum('kolicina');
        $bezPDV_sum = DB::table('items')->where('order_id','=', $order->id)->sum('cijena_bez_pdv');
        $iznos5x4_sum = DB::table('items')->where('order_id','=', $order->id)->sum('iznos5x4');
        $pdv_iznos_sum = DB::table('items')->where('order_id','=', $order->id)->sum('pdv_iznos');
        $ukupno_sum = DB::table('items')->where('order_id','=', $order->id)->sum('ukupno');

        return view('orders2020.show')
        ->with('order',$order)->with('items',$order->items)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    

        $order = Order::find($id);
        $zavod = DB::table('departments')->pluck('odjel');
        $zavod->prepend('Izaberite');
        $placanje = DB::table('payments')->pluck('nacin_placanja');
        $placanje->prepend('Izaberite');
        return view('orders2020.edit')->with('order',$order)->with('zavod',$zavod)->with('placanje',$placanje);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[

            'naziv_prod' => 'required|min:1|max:135',
    
            'oib' => 'required',
        
            'zavod' => 'required|integer|min:1',
    
            'sastavio' => 'required',
    
            'odobrio' => 'required',
    
    
        ],[
    
            'naziv_prod.required' => 'Naziv prodavatelja je obavezno polje',
    
            'oib.required' => 'OIB je obavezno polje',
    
            'zavod.required' => 'Zavod je obavezno polje',

            'min' => [
                'numeric' => ':Attribute je obavezno polje'],

            'zavod.required.min.numeric' => 'Zavod je obavezno polje',

            'sastavio.required' => 'Sastavio narudžbu je obavezno polje',
    
            'odobrio.required' => 'Odobrio narudžbu je obavezno polje',
        
        ]);
 


        $order = Order::find($id);
        $order->naziv = $request->input('naziv');
        $order->rok_vazenja = $request->input('rok_vazenja');

        $order->nadnevak   = $request->input('nadnevak');
        $order->naziv_prod = $request->input('naziv_prod');
        $order->mjesto = $request->input('mjesto');
        $order->ulica_br = $request->input('ulica_br');
        $order->broj_tel = $request->input('broj_tel');
        $order->oib = $request->input('oib');
        $order->racun_prim = $request->input('racun_prim');
        $order->zavod = $request->input('zavod');

        //$order->naruc_dobra=$request->input('naruc_dobra');
        //$order->rok_isporuke=$request->input('rok_isporuke');
        //$order->nacin_otpreme=$request->input('nacin_otpreme');
        $order->rok = $request->input('rok');
        $order->nacin_placanja= $request->input('nacin_placanja');
        $order->sastavio = $request->input('sastavio');
        $order->odobrio  = $request->input('odobrio');
        $order->napomena  = $request->input('napomena');


        $order->save();

        return redirect('orders2020/'.$order->id)->with('success','Narudžbenica ažurirana!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $order = Order::find($id);    
            $order->delete();
            return redirect('orders2020/')->with('success','Narudžba je izbrisana!'); 
        
    }

    public function generatePDF($id)

    {

        $orders = Order::find($id);      
        $items = Item::find($id);
        
        $zavod = DB::table('orders')
                ->join('departments','orders.zavod','=','departments.id')
                ->where('orders.id','=',$id)
                ->select('departments.odjel')
                ->get(); 

        $nacin_plac = DB::table('orders') 
                      ->join('payments','orders.nacin_placanja','=','payments.id')
                      ->where('orders.id','=',$id)
                      ->select('payments.nacin_placanja')
                      ->get();

        $kolicina_sum = DB::table('items')->where('order_id','=', $orders->id)->sum('kolicina');
        $bezPDV_sum = DB::table('items')->where('order_id','=', $orders->id)->sum('cijena_bez_pdv');
        $iznos5x4_sum = DB::table('items')->where('order_id','=', $orders->id)->sum('iznos5x4');
        $pdv_iznos_sum = DB::table('items')->where('order_id','=', $orders->id)->sum('pdv_iznos');
        $ukupno_sum = DB::table('items')->where('order_id','=', $orders->id)->sum('ukupno');

        $pdf = PDF::loadView('orders2020/ordersPDF', $orders);
        return $pdf->download('Narudžbenica_br_'.$id.'_2020.pdf')

;
        
    }



}
