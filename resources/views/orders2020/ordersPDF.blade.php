
<?php 
use App\Order; 
use App\Item; 
use App\User;
?>
<link rel="stylesheet" href="{{ URL::asset('css/mycss.css') }}" >

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style>
        body { font-family: DejaVu Sans, sans-serif;font-size: 12px;padding-left: 9%; }
</style>



<?php

$orders = Order::where('orders.id','=',$id)
        ->get();

$items = Item::where('order_id','=',$id)
        ->get();
        
        
$zavod = DB::table('orders')
                ->join('departments','orders.zavod','=','departments.id')
                ->where('orders.id','=',$id)
                ->select('departments.odjel')
                ->get(); 
?>


@foreach($orders as $order)
    <!--<h2 style="margin-left:-45px">Naziv narudžbenice: {{$order->naziv_prod}} </h2>--><br> 

    <div class="divTable" style="">
        <div class="divTableBody">

            <div class="divTableRow">

                <div class="divTableCell" style="  text-align: center;width:40%;background-color:#ffffb3"><strong>KUPAC(PRIMATELJ)- naziv, ime i prezime,<br> adresa, mjesto, ulica i broj telefona</strong>
                </div>

                <div class="divTableCell" style=" border: 0px ;  text-align: center;width:20%"><span style="font-weight: bold;"></span>
                </div>

                <div class="divTableCell" style="  text-align: center;width:40%;background-color:#ffffb3	"><strong>ISPORUČITELJ(PRODAVATELJ), naziv, ime i prezime<br> adresa, mjesto, ulica i broj telefona</strong>&nbsp;
                </div>

        </div>

            <div class="divTableRow">
                <div class="divTableCell" style="text-align: center;">  HRVATSKI GEOLOŠKI INSTITUT<br>
                    SACHSOVA 2<br>
                    10 000 ZAGREB<br>
                    OIB: 43733878539<br></div>

                <div class="divTableCell"style=" border: 0px"></div>

                <div class="divTableCell"><strong>Naziv prodavatelja:</strong>
                    {{$order->naziv_prod}}<br>
                    
                    <strong>Mjesto prodavatelja, ulica i broj:</strong>
                    {{$order->mjesto}},{{$order->ulica_br}}<br>
                    
                    <strong>Broj telefona:</strong>
                    {{$order->broj_tel}}<br>
                    
                    <strong>OIB:</strong>
                    {{$order->oib}}<br></div>
            </div>

            <div class="divTableRow">
                <div class="divTableCell" style="  text-align: center;font-size:10px">(MB/OIB)
                </div>
        
                <div class="divTableCell" style=" border: 0px">
                </div>

                <div class="divTableCell"style="  text-align: center;font-size:10px">(MB/OIB)
                </div>
            
            </div>

  
            <div class="divTableRow">
                    <div class="divTableCell"style="border: 0px;width:33%">
                    
                    
                            @foreach($zavod as $odjel)
                            <strong>Zavod:</strong>
                            {{$odjel->odjel}}<br>
                            @break
                            @endforeach
                            <strong>Nadnevak: </strong> {{$order->created_at->format('d/m/Y')}}<br>
                            <strong>Rok važenja/sklapanja: </strong> {{$order->rok_vazenja}}<br>
                    
                    </div>
                    <br>
                    <div class="divTableCell" style="border: 0px;width:10%"></div>


                    <div class="divTableCell"style=" border: 0px;width:30%">
                    
                            <h3 style="margin-left:2px">NARUDŽBENICA br. {{$order->id}}/20</h3>
                    </div>
            </div>

        </div>
    </div>
            
            
            <div class="divTable" style="table-layout: fixed; max-width:100%;">
                <div class="divTableRow">

                    <div class="divTableHead" style="text-align:center;vertical-align:middle;background-color: #ffffb3;width:5%">Red.<br>br.</div>

                    <div class="divTableHead" style="white-space: nowrap; text-align:center;vertical-align:middle;width:33%">TRGOVAČKI NAZIV DOBRA<br>- USLUGE</div>

                    <div class="divTableHead" style="text-align:center;vertical-align:middle;background-color:#ffffb3;width:7%">Jed.<br>mjere</div>

                    <div class="divTableHead" style="text-align:center;vertical-align:middle;width:8%">Količina</div>

                    <div class="divTableHead" style="text-align:center;background-color:#ffffb3;width:10%">CIJENA<br>(bez PDV-a)</div>

                    <div class="divTableHead" style="text-align:left;width:20%;text-align:center;vertical-align:middle;width:10%">IZNOS<br>(5X4)</div>

                    <div class="divTableHead" style="text-align:center;vertical-align:middle;background-color:#ffffb3;width:7%">PDV</div>

                    <div class="divTableHead" style="text-align:center;vertical-align:middle;width:10%">Iznos PDV-a<br></div>

                    <div class="divTableHead" style="text-align:center;vertical-align:middle;background-color:#ffffb3;width:10%">UKUPNO<br>(sa PDV-om)</div>


            </div>

            <div class="divTableRow">

                    <div class="divTableCell" style="text-align:center;vertical-align:middle;font-size:10px;background-color:#ffffb3;">1</div>

                    <div class="divTableCell" style="text-align:center;vertical-align:middle;font-size:10px">2</div>

                    <div class="divTableCell" style="text-align:center;vertical-align:middle;font-size:10px;background-color:#ffffb3">3</div>

                    <div class="divTableCell" style="text-align:center;vertical-align:middle;font-size:10px">4</div>

                    <div class="divTableCell"style="text-align:center;vertical-align:middle;font-size:10px;background-color:#ffffb3">5</div>

                    <div class="divTableCell"style="text-align:center;vertical-align:middle;font-size:10px">6</div>

                    <div class="divTableCell" style="text-align:center;vertical-align:middle;font-size:10px;background-color:#ffffb3">7</div>

                    <div class="divTableCell" style="text-align:center;vertical-align:middle;font-size:10px">8</div>

                    <div class="divTableCell" style="text-align:center;vertical-align:middle;font-size:10px;background-color:#ffffb3">9</div>

            </div>

            @foreach($items as $item)

            <div class="divTableRow">

                    <div class="divTableCell" style="background-color:#ffffb3">{{$item->rb}}</div>

                    <div class="divTableCell">{{$item->naziv_dobra}}</div>

                    <div class="divTableCell" style="background-color:#ffffb3 align=left">{{$item->jed_mjere}}</div>

                    <div class="divTableCell">{{$item->kolicina}}</div>

                    <div class="divTableCell" style="background-color:#ffffb3">{{$item->cijena_bez_pdv}}</div>

                    <div class="divTableCell">{{$item->iznos5x4}}</div>

                    <div class="divTableCell" style="background-color:#ffffb3">{{$item->pdv}}%</div>

                    <div class="divTableCell">{{$item->pdv_iznos}} </div>

                    <div class="divTableCell" style="background-color:#ffffb3">{{$item->ukupno}}</div>

            </div>


            @endforeach

            
            <?php   $kolicina_sum = DB::table('items')->where('order_id','=', $id)->sum('kolicina');
            $bezPDV_sum = DB::table('items')->where('order_id','=', $id)->sum('cijena_bez_pdv');
            $iznos5x4_sum = DB::table('items')->where('order_id','=', $id)->sum('iznos5x4');
            $pdv_iznos_sum = DB::table('items')->where('order_id','=', $id)->sum('pdv_iznos');
            $ukupno_sum = DB::table('items')->where('order_id','=', $id)->sum('ukupno');  ?>



            <div class="divTableRow">
                
                    <div class="divTableCell" style="border:0"></div>

                    <div class="divTableCell" style="border:0"></div>
                    <div class="divTableCell" style="border:0"></div>


                   {{--<div class="divTableCell" style="background-color: #f2f2f2;font-weight: bold;">UKUPNO</div>--}}

                    <div class="divTableCell"style="background-color:  #f2f2f2;font-weight: bold;">{{$kolicina_sum}}</div>

                    <div class="divTableCell"style="background-color:  #f2f2f2;font-weight: bold">{{$bezPDV_sum}}</div>

                    <div class="divTableCell"style="background-color:  #f2f2f2;font-weight: bold">{{$iznos5x4_sum}}</div>

                    <div class="divTableCell" style="border:0"></div>

                    <div class="divTableCell"style="background-color:#f2f2f2;font-weight: bold">{{$pdv_iznos_sum}}</div>

                    <div class="divTableCell"style="background-color:#f2f2f2;font-weight: bold">{{$ukupno_sum}}  </div>

            </div>

                
        </div>


        <?php $nacin_plac = DB::table('orders') 
                      ->join('payments','orders.nacin_placanja','=','payments.id')
                      ->where('orders.id','=',$id)
                      ->select('payments.nacin_placanja')
                      ->get();
        ?>


        <div class="divTable" style="table-layout: fixed; width:100%;">
            <div class="divTableRow">
                <div class="divTableCell" style="border:0px"><p>NAŠU NARUDŽBU PLATIT ĆEMO: {{$order->rok}}<br>
                    NAČIN PLAĆANJA:    
                    @foreach($nacin_plac as $vrsta_placanja)
                    @if($vrsta_placanja == true)
                    {{$vrsta_placanja->nacin_placanja}}</p>
                    @break
                    @endif
                @endforeach
                </div>
            </div>
        </div>


        <div class="divTable" style="border:0px;">
                <div class="divTableRow">
                        <div style="float:right;margin-right:10%">Narudžbu sastavio:
                        {{$order->sastavio}}
                        Narudžbu odobrio: {{$order->odobrio}} 
                        </div>
                </div>
        </div>

        <br><br><br> 
        <div class="divTable"  style="border:0px;" > 
                <div class="divTableRow">
                        <i>Narudžbenica je pisana u elektronskom obliku i pravovaljana je bez žiga i potpisa.
                        </i>
                 </div>
        </div>

        
   
        
        @endforeach






                