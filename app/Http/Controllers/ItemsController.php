<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;
use App\User;
use DB;

class ItemsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('items')
        ->whereYear('created_at', '=', 2020)
        ->orderby('id', 'desc')
        ->paginate(20);
        return view('goods.index')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         /* preko modala je create funkcija
         
        $url = Request::route('id');
        $orders = DB::table('orders')
          ->where('id','=',$url)
          ->get();
          $items = DB::table('items')
          ->join('orders','orders.id','=','items.order_id')
          ->where('orders.id','=',$url)
          ->get();
        return view('goods.create');
    */
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

            'naziv_dobra' => 'required|min:1|max:135',
    
        ],[
    
            'naziv_dobra.required' => 'Naziv prodavatelja je obavezno polje',
    
            
        ]);

        $item = new Item;
        $item->rb = $request->input('rb');
        $item->order_id = $request->input('uri');
        $item->user_id = auth()->user()->id;
        $item->naziv_dobra = $request->input('naziv_dobra');
        $item->jed_mjere = $request->input('jed_mjere');
        $item->kolicina = $request->input('kolicina');
        $item->cijena_bez_pdv = $request->input('cijena_bez_pdv');
        $item->cijena_bez_pdv = str_replace(',', '.', $item->cijena_bez_pdv);
        $item->pdv = $request->input('pdv');
        $item->pdv_iznos = $request->input('pdv_iznos');
        $item->ukupno = $request->input('ukupno');
        $item->iznos5x4=$request->input('iznos5x4');

        //Iznos 5x4
        if (isset($_POST['cijena_bez_pdv'])){
            $iznos = $item->cijena_bez_pdv*$item->kolicina;
    
            $item->iznos5x4=$iznos;
            }
        //Iznos PDV-a
        if (isset($_POST['cijena_bez_pdv'])){
            $iznos = $item->iznos5x4*$item->pdv/100;
            $item->pdv_iznos=$iznos;
            }
        //Ukupno Cijena bez PDV + Iznos PDV-a
        if (isset($_POST['cijena_bez_pdv'])){
            //$iznos = $item->iznos5x4*$item->pdv/100+$item->cijena_bez_pdv;
            $iznos = $item->iznos5x4+$item->pdv_iznos;
            $item->ukupno=$iznos;
            }
 
        $item->save();
        $orderid = $item->order_id;
    
       return redirect('orders2020/'.$orderid)->with('success','Stavka je dodana!');
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
        $items = DB::table('items')
            ->join('orders','orders.id','=','items.order_id')
            ->where('items.order_id','=','orders.id')
            ->get();

            //DB::table('items')->where('order_id','=', $order->id)->sum('kolicina');

        return view('goods.show')->with('items',$items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Item::find($id);
        return view('goods.edit')->with('items',$items);
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

            'naziv_dobra' => 'required|min:1|max:135',
    
        ],[
    
            'naziv_dobra.required' => 'Naziv prodavatelja je obavezno polje',
    
            
        ]);

        $item = Item::find($id);
        $item->rb = $request->input('rb');
        $item->naziv_dobra = $request->input('naziv_dobra');
        $item->jed_mjere = $request->input('jed_mjere');
        $item->kolicina = $request->input('kolicina');
        $item->cijena_bez_pdv = $request->input('cijena_bez_pdv');
        $item->pdv = $request->input('pdv');
        $item->pdv_iznos = $request->input('pdv_iznos');
        $item->ukupno = $request->input('ukupno');
        $item->iznos5x4=$request->input('iznos5x4');

        if (isset($_POST['cijena_bez_pdv'])){
            $iznos = $item->cijena_bez_pdv*$item->kolicina;
    
            $item->iznos5x4=$iznos;
            }


        if (isset($_POST['cijena_bez_pdv'])){
                $iznos = $item->iznos5x4*$item->pdv/100;
                $item->pdv_iznos=$iznos;
                }    


                if (isset($_POST['cijena_bez_pdv'])){
                    //$iznos = $item->iznos5x4*$item->pdv/100+$item->cijena_bez_pdv;
                    $iznos = $item->iznos5x4+$item->pdv_iznos;
                    $item->ukupno=$iznos;
                    }

            
        $item->save();

        $orderid = $item->order_id;
    
        return redirect('orders2020/'.$orderid)->with('success','Stavka je ažuirana!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $orderid = $item->order_id;


        $item->delete();
      
        return redirect('orders2020/'.$orderid)->with('success','Stavka je izbrisana!'); 
    }
}
