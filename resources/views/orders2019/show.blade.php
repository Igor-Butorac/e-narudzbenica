
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

@extends('layouts.app')
@section('content')
<?php 
use App\Order; 
use App\Item2019; 
use App\User;
?>
<br>

<link rel="stylesheet" href="{{ URL::asset('css/mycss.css') }}" >

<button id ="printPageButton" type="button" class="btn btn-success">
<a style="color:white" href="{{URL::to('orders2019/ordersPDF/'.$order->id)}}">Spremi kao PDF</a>
</button>
<br><br>    

<h2  id ="printPageButton" style="margin-left:5%;">Naziv narudžbenice: {{$order->naziv_prod}} </h2><br>
<div class="rTable">
<div  style="table-layout: fixed; width:100%;  margin-left:-1%;">
        <div class="rTableRow">
            <div class="rTableHead" style="  text-align: center;width:40%;background-color:#ffffb3	"><strong>KUPAC(PRIMATELJ)- naziv, ime i prezime,<br> adresa, mjesto, ulica i broj telefona</strong></div>
            <div class="rTableHead"style=" border: 0px ;  text-align: center;width:20%"><span style="font-weight: bold;"></span></div>
            <div class="rTableHead"style="  text-align: center;width:40%;background-color:#ffffb3	"><strong>ISPORUČITELJ(PRODAVATELJ), naziv, ime i prezime<br> adresa, mjesto, ulica i broj telefona</strong>&nbsp;</div>
        </div>


        <div class="rTableRow">
            <div class="rTableCell" style="text-align: center;">
                   HRVATSKI GEOLOŠKI INSTITUT<br>
                   SACHSOVA 2<br>
                   10 000 ZAGREB<br>
                   OIB: 43733878539<br>
           </div>

            <div class="rTableCell"style=" border: 0px"></a></div>
            
            <div class="rTableCell"><strong>Naziv prodavatelja:</strong>
                   {{$order->naziv_prod}}<br>
                   
                   <strong>Mjesto prodavatelja, ulica i broj:</strong>
                   {{$order->mjesto}},{{$order->ulica_br}}<br>
                   
                   <strong>Broj telefona:</strong>
                   {{$order->broj_tel}}<br>
                   
                   <strong>OIB:</strong>
                   {{$order->oib}}<br>
                   
           </div>
       </div>
            
       <div class="rTableRow" >
            <div class="rTableCell" style="  text-align: center;font-size:10px">(MB/OIB)</div>
            <div class="rTableCell"style=" border: 0px"></div>
            <div class="rTableCell" style="  text-align: center;font-size:10px">(MB/OIB)</div>
       </div>
                        
   <br>


           
   <div class="rTableRow" >
                 
     <div class="rTableCell" style="border: 0px;width:33%">
   {{-- <strong>Žiro račun kupca(primatelja):</strong> {{$order->racun_prim}}<br>--}} 


       @foreach($zavod as $odjel)
       <strong>Zavod:</strong>
       {{$odjel->odjel}}<br>
       @break
       @endforeach

      <strong>Nadnevak: </strong> {{Carbon\Carbon::parse($order->created_at)->format('d-m-y')}}<br>
       <strong>Rok važenja/sklapanja: </strong> {{$order->rok_vazenja}}<br>

       <!--strong>Rok važenja/sklapanja: </strong> {{--$order->created_at->format('d/m/Y')--}}</br>-->
    </div>    
   
        <div class="rTableCell"style=" border: 0px;width:10%"></div>
        <div class="rTableCell"style=" border: 0px;width:30%">
            <!-- <p style="margin-left:105px;font-size:25px;">NARUDŽBENICA br. {{--$order->id--}}</p>--> 
            <h3 style="margin-left:2px">NARUDŽBENICA br. {{$order->id}}/19</h3>
        </div>
    </div>
</div>    

<br>    

<div style="table-layout: fixed; max-width:100%;  margin-left:-1%;">
    <h5 ><i>NARUČUJEMO:</i></h5>


<div  class="rTableRow"  >

    <div class="rTableHead" style="text-align:center;vertical-align:middle;background-color: #ffffb3

    ;">Red.<br>br.
    </div>

    <div  style="white-space: nowrap;"class="rTableHead"style="text-align:center;vertical-align:middle;">TRGOVAČKI NAZIV DOBRA - USLUGE
    </div>

    <div class="rTableHead"style="text-align:center;vertical-align:middle;background-color:#ffffb3;width:5%	">Jed.<br>mjere
    </div>

    <div class="rTableHead"style="text-align:center;vertical-align:middle;width:5%">Količina
    </div>

    <div class="rTableHead"style="text-align:center;background-color:#ffffb3;width:12%	">CIJENA<br>(bez PDV-a)
    </div>

    <div class="rTableHead"style="text-align:left;width:20%;text-align:center;vertical-align:middle;">IZNOS<br>(5X4)
    </div>
     <div class="rTableHead"style="text-align:center;vertical-align:middle;background-color:#ffffb3">PDV<br>
    </div>

    <div class="rTableHead"style="text-align:center;vertical-align:middle">Iznos PDV-a<br>
    </div>

    <div class="rTableHead"style="text-align:center;vertical-align:middle;background-color:#ffffb3">UKUPNO (sa PDV-om)<br>
    </div>

</div>

<div class="rTableRow">

    <div class="rTableCell" style="text-align:center;vertical-align:middle;font-size:10px;background-color:#ffffb3	;">1
    </div>

    <div class="rTableCell" style="text-align:center;vertical-align:middle;font-size:10px">2
    </div>

    <div class="rTableCell" style="text-align:center;vertical-align:middle;font-size:10px;background-color:#ffffb3	">3
    </div>

    <div class="rTableCell" style="text-align:center;vertical-align:middle;font-size:10px">4
        </div>

    <div class="rTableCell" style="text-align:center;vertical-align:middle;font-size:10px;background-color:#ffffb3	">5
    </div>

    <div class="rTableCell" style="text-align:center;vertical-align:middle;font-size:10px">6
    </div>

    <div class="rTableCell" style="text-align:center;vertical-align:middle;font-size:10px;background-color:#ffffb3">7
    </div>

    <div class="rTableCell" style="text-align:center;vertical-align:middle;font-size:10px">8
    </div>

    <div class="rTableCell" style="text-align:center;vertical-align:middle;font-size:10px;background-color:#ffffb3">9
        </div>

 
</div>

@foreach($items as $item)

<div class="rTableRow" > <!-- svaki drugi style="background-color:#F0F0F0" -->

    <div class="rTableCell" style="background-color:#ffffb3">{{$item->rb}}</div>

    <div class="rTableCell">{{$item->naziv_dobra}}
    </div>

    <div class="rTableCell" style="background-color:#ffffb3">{{$item->jed_mjere}}
    </div>

    <div class="rTableCell">{{$item->kolicina}}
    </div>

    <div class="rTableCell" style="background-color:#ffffb3">{{$item->cijena_bez_pdv}}
    </div>

    <div class="rTableCell" >{{$item->iznos5x4}}
    </div>

    <div class="rTableCell" style="background-color:#ffffb3">{{$item->pdv}}%
    </div>

    <div class="rTableCell">{{$item->pdv_iznos}} 
        </div>

    <div class="rTableCell"style="background-color:#ffffb3">{{$item->ukupno}}
    </div>
    


</div>
@endforeach   
<div class="rTableRow" >
    <div class="rTableCell" style="border:0"style="">
    </div>
    <div  class="rTableCell" style="border:0" style="">
                        
        </div>
        <div  class="rTableCell" style="background-color: #f2f2f2
        ;  font-weight: bold;
        ">
                UKUPNO

            </div>
            <div  class="rTableCell" style="background-color:  #f2f2f2


            ; font-weight: bold;
            ">
                 {{$kolicina_sum}}
                </div>

                <div  class="rTableCell" style="background-color:  #f2f2f2


                ; font-weight: bold">
                    {{$bezPDV_sum}}      
                    </div>

                <div  class="rTableCell" style="background-color:  #f2f2f2

                ; font-weight: bold">
                    {{$iznos5x4_sum}}  
                    </div>
                    <div  class="rTableCell" style="border:0">           
                        </div>

                        <div  class="rTableCell" style="background-color:  #f2f2f2

                        ; font-weight: bold">
                            {{$pdv_iznos_sum}}   

                            </div>
                            <div  class="rTableCell" style="background-color:  #f2f2f2

                            ; font-weight: bold">
                                {{$ukupno_sum}}  

                                </div>
                              

</div>

<br><br>

@if($order->napomena == true)
        <div  class="form-group">
            <p>NAPOMENA:
            {{$order->napomena}}</p>
            </div>
            @endif


</div>
    <div style="table-layout: fixed; width:100%;  margin-left:-1%;">
            <p>NAŠU NARUDŽBU PLATIT ĆEMO: {{$order->rok}}<br>
        NAČIN PLAĆANJA:

        @foreach($nacin_plac as $vrsta_placanja)
            @if($vrsta_placanja == true)
            {{$vrsta_placanja->nacin_placanja}}</p>
            @break
            @endif
        @endforeach

        <br>     
        <div  style="float: right;font-size:18px">
            <p class="">Narudžbu sastavio:
            {{$order->sastavio}} &nbsp Narudžbu odobrio: {{$order->odobrio}}</p> 
        </div>            
    </div>
    </div>
    <br>
    <div style="table-layout: fixed; width:100%;  margin-left:5%;">
            <p style="font-size:20px"><i>Narudžbenica je pisana u elektronskom obliku i pravovaljana je bez žiga i potpisa.</i></p>
    </div>


        <hr style="width:100%;  margin-left:5%;" id ="printPageButton">
        <div style="text-align:center">
        <button id ="printPageButton" class="btn btn-success"  onClick="window.print()">Print</button>
        



        
        <br><br><br>
@endsection 