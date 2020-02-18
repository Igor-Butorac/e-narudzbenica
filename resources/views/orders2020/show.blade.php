
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

@extends('layouts.app')
@section('content')
<?php 
use App\Order; 
use App\Item; 
use App\User;

?>
<br>

<link rel="stylesheet" href="{{ URL::asset('css/mycss.css') }}" >

<button id ="printPageButton" type="button" class="btn btn-success">
<a style="color:white" href="{{ URL::to('orders2020/ordersPDF/'.$order->id) }}">Spremi kao PDF</a>
</button>
<br><br>

<!--
<a href="{{ URL::to('ordersPDF/'.$order->id) }}">Spremi kao PDF</a>-->




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
                    <strong>Nadnevak: </strong> {{$order->created_at->format('d/m/Y')}}<br>
                    <strong>Rok važenja/sklapanja: </strong> {{$order->rok_vazenja}}<br>

                    <!--strong>Rok važenja/sklapanja: </strong> {{--$order->created_at->format('d/m/Y')--}}</br>-->
                 </div>    
                
                <div class="rTableCell"style=" border: 0px;width:10%"></div>
                <div class="rTableCell"style=" border: 0px;width:30%">
                    <!-- <p style="margin-left:105px;font-size:25px;">NARUDŽBENICA br. {{--$order->id--}}</p>--> 
                    <h3 style="margin-left:2px">NARUDŽBENICA br. {{$order->id}}/20</h3>
                </div>
            </div>
        </div>         

                <br>      
                {{--        
            <div class="rTable">
            <div class="rTableRow" style="height:100px;">
                                
                <div class="rTableHead" style="text-align: left;width:68%;background-color:#FFFF99	">
                        <strong>NARUČENA DOBRA - USLUGE ISPORUČITE NA NASLOV:</strong><br>
                        {{$order->naruc_dobra}}
                </div>

                <div class="rTableHead" style="text-align: left;width:1%;border:0px"></div>

                <div class="rTableHead"style="text-align: left;width:15%;background-color:#FFFF99">
                        <strong> ROK ISPORUKE:</strong><br>
                        {{$order->rok_isporuke}}
                </div>

                <div class="rTableHead" style="text-align: left;width:1%;border:0px"></div>

                <div class="rTableHead"style="text-align: left;width:15%;background-color:#FFFF99">
                        <strong>NAČIN OTPREME:</strong>
                        {{$order->nacin_otpreme}}
                </div>
            
            </div>
        </div>
        --}} 


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

                @if($order->user_id == Auth::user()->id or Auth::User()->type_of_user == 1)
                <div class="rTableHead"   id="printPageButton"   style="text-align:center;vertical-align:middle">Uredi<br>
                </div>

                <div class="rTableHead"    id="printPageButton"   style="text-align:center;vertical-align:middle">Izbriši<br>
                </div>
                @endif
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

                @if($order->user_id == Auth::user()->id or Auth::User()->type_of_user == 1)

                <div class="rTableCell" id="printPageButton"  style="text-align:center;vertical-align:middle;font-size:10px">10
                </div>
                <div class="rTableCell" id="printPageButton" style="text-align:center;vertical-align:middle;font-size:10px">11
                </div>
                @endif
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
                
            <!--buttons for edit and delete -->
            @if($order->user_id == Auth::user()->id or Auth::User()->type_of_user == 1)

                <div id ="printPageButton" class="rTableCell">
                    <a href="{{url('goods')}}/{{$item->id}}/edit" class ="btn btn-primary" id ="printPageButton" style="height:35px">Uredi</a>
                </div>

                <div  id ="printPageButton" class="rTableCell" >
                        {{Form::open(['action'=>['ItemsController@destroy',$item->id],'method'=>'POST']) }}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Izbriši',['class'=>'btn btn-danger','id' => 'printPageButton','name'=>'delitem','onclick'=>'return confirm("Da li ste sigurni?")'])}}
                        {{Form::close()}}
                </div>

            @endif

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
<br>

@if($order->user_id == Auth::user()->id or Auth::User()->type_of_user == 1)
            <button style="margin-left:0.1%;
            " type="button" id ="printPageButton" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Dodaj novu stavku
            </button>
        @endif
        <br/>
        <br/>

        @if($order->napomena == true)
        <div  class="form-group">
            <p>NAPOMENA:
            {{$order->napomena}}</p>
            </div>
            @endif

  <!-- Modal add-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dodaj stavke za narudžbu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(['action' =>['ItemsController@store',''],'method'=>'POST','style'=>'width:50%',]) !!}     
           <div class="modal-body">
            
            {{csrf_field()}}
            

            

            <div class="form-group">
                <h3><i>NARUČUJEMO:</i></h3>
                 
            @if(empty($item->rb))
            {{Form::label('rb','Red. br.')}}
            {{Form::text('rb',1,['class'=>'form-control','readonly'])}}</p>
             @else
            {{Form::label('rb','Red. br.')}}
            {{Form::text('rb',$item->rb+1,['class'=>'form-control','readonly'])}}</p>
            @endif
           
            {{Form::hidden('uri', $order->id,['class'=>'form-control'])}}

            {{Form::label('naziv_dobra','Trgovački naziv dobra - usluge')}}
            {{Form::text('naziv_dobra','',['class'=>'form-control'])}} 

            {{Form::label('jed_mjere','Jed. mjere')}}
            {{Form::text('jed_mjere','',['class'=>'form-control'])}}

            {{Form::label('kolicina','Količina')}}
            {{Form::text('kolicina','',['class'=>'form-control'])}}

            {{Form::label('cijena_bez_pdv','CIJENA(bez PDV-a)')}}
            {{Form::text('cijena_bez_pdv','',['class'=>'form-control'])}}

            {{Form::label('pdv','PDV(unesite samo broj)')}}
            {{Form::text('pdv','',['class'=>'form-control'])}}

            {{Form::hidden('ukupno','Ukupno')}}
            {{Form::hidden('ukupno','',['class'=>'form-control'])}}
        
        
            {{--Form::hidden('iznos5x4','IZNOS 5X4')}} 
            {{Form::hidden('iznos5x4','',['class'=>'form-control'])--}}
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
          <button type="submit" class="btn btn-primary">Dodaj</button>
            </div>
         </form>
      </div>
    </div>    
</div>
<!------ MODAL KRAJ ---->

        
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
        

        @if($order->user_id == Auth::user()->id or Auth::User()->type_of_user == 1)
        <a href="{{url('orders2020')}}/{{$order->id}}/edit" id ="printPageButton" name ="print_btn" class="btn btn-primary">Uredi</a>
        </div>
        @endif

        {{-- 
            Maknuto da ne izbrišu slučajno oni koji su admini
        @if(Auth::User()->type_of_user == 1)

        <hr style="width:100%;  margin-left:5%;" id ="printPageButton">
                <div style ="text-align: center">
            {{Form::open(['action'=>['Orders2020Controller@destroy',$order->id],'method'=>'POST',]) }}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Izbriši',['class'=>'btn btn-danger','style'=>'vertical-align:center','id' => 'printPageButton','name'=>'delete_item','onclick'=>'return confirm("Da li ste sigurni?")'])}}
            {{Form::close()}}
    </div>
</div>

@endif
      --}}  

        <br><br><br>

        @endsection 