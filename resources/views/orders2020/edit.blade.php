<?php use App\Department;
use App\Item;
use App\Payment;
use App\Order; 
?>

@extends('layouts.app')
@section('content')

<br>
        <link rel="stylesheet" href="{{ URL::asset('css/mycss.css') }}" >

 
        <div style=" border-style: solid;
        border-color: black;padding:5px; width:40%; margin-top: 4%;
        margin-left: 30%;background-color:#FFFF99;">

     {!! Form::open(['action' =>['Orders2020Controller@update',$order->id],'method'=>'POST',]) !!}
     <h1 style="text-align:center">NARUDŽBENICA br. {{$order->id}}</h1> 
        <hr>
            <h2  style="text-align:center">Naziv narudžbenice:<br>
                    {{$order->naziv_prod}}</h2>
        <hr>
              {{--
			 <div class="rTableRow">

                 <div class="rTableHead" style="  text-align: center;width:40%;background-color:#FFFF99	">
                 <strong>KUPAC(PRIMATELJ)- naziv, ime i prezime,</br> adresa, mjesto, ulica i broj telefona</strong>
                </div>
                
                <div class="rTableHead"style=" border: 0px ;  text-align: center;width:20%">
                 <span style="font-weight: bold;"></span>
                </div>

				 <div class="rTableHead"style="  text-align: center;width:40%;background-color:#FFFF99	"><strong>ISPORUČITELJ(PRODAVATELJ), naziv, ime i prezime</br> adresa, mjesto, ulica i broj telefona</strong>&nbsp;</div>
                 </div>
                 
				 <div class="rTableRow">

				 <div class="rTableCell" style="text-align: center;vertical-align:middle;font-size:20px">
                        HRVATSKI GEOLOŠKI INSTITUT</br>
                        SACHSOVA 2</br>
                        10 000 ZAGREB</br>
                        OIB: 43733878539</br>
                </div>

                --}}
                 
				 <div class="rTableCell" style="border: 0px">
                 <strong>Naziv prodavatelja:</strong>  <br>
                 {{Form::text('naziv_prod',$order->naziv_prod,['class'=>'form-control','placeholder'=>'Unesite prodavatelja','style' => 'width:400px'])}}
                
                 <strong>Mjesto prodavatelja:</strong> <br>
                 {{Form::text('mjesto',$order->mjesto,['class'=>'form-control','placeholder'=>'Unesite mjesto prodavatelja','style' => 'width:250px'])}}

                 <strong>Ulica i broj:</strong>
                 {{Form::text('ulica_br',$order->ulica_br,['class'=>'form-control','placeholder'=>'Unesite naziv ulice prodavatelja','style' => 'width:250px'])}}

                <strong>Broj telefona:</strong>
                {{Form::text('broj_tel',$order->broj_tel,['class'=>'form-control','placeholder'=>'Unesite naziv ulice prodavatelja','style' => 'width:250px'])}}
                        
                <strong>OIB prodavatelja:</strong>
                {{Form::text('oib',$order->oib,['class'=>'form-control','style' => 'width:250px'])}}
                </div>
                 
			{{--<div class="rTableRow" >
				 <div class="rTableCell" style="  text-align: center;font-size:10px">(MB/OIB)</div>
				 <div class="rTableCell"style=" border: 0px"></div>
				 <div class="rTableCell" style="  text-align: center;font-size:10px">(MB/OIB)</div>
            </div> --}}
    

            <!-- 2 RED TABLICE-->
                 
            <div class="rTableRow" >
                         
                 <div class="rTableCell" style="border: 0px">
                 <strong>Žiro račun kupca(primatelja):</strong>
                 {{Form::number('racun_prim',$order->racun_prim,['class'=>'form-control',])}}
                  
                 <strong>Zavod:</strong>
                 {{Form::select('zavod',$zavod,$order->zavod,['class'=>"form-control"])}}
                
                {{-- }} <strong>Nadnevak: </strong>
                 {{$order->created_at->format('d/m/Y')}} </br>--}}

                 <strong>Rok važenja/sklapanja:</strong>
                 {{Form::text('rok_vazenja',$order->rok_vazenja,['class'=>'form-control',])}}

                 </div>    
                
              <div class="rTableCell"style=" border: 0px"> </div>
              <div class="rTableCell"style=" border: 0px; font-size:30px;text-align:center"><br></div>
              </div>
                <br>              
         {{--   
            <div class ="rTable">

                <div class="rTableRow" style="height:100px">
                                
                    <div class="rTableHead" style="text-align: left;width:68%;background-color:#FFFF99	">
                    <strong>NARUČENA DOBRA - USLUGE ISPORUČITE NA NASLOV:</strong></br>{{Form::text('naruc_dobra',$order->naruc_dobra,['class'=>'form-control',])}}
                    </div>

                    <div class="rTableHead" style="text-align: left;width:1%;border:0px">
                    </div>

                    <div class="rTableHead"style="text-align: left;width:15%;background-color:#FFFF99"><strong> ROK ISPORUKE:</strong></br>
                           {{Form::text('rok_isporuke',$order->rok_isporuke,['class'=>'form-control',])}}
                    </div>

                    <div class="rTableHead" style="text-align: left;width:1%;border:0px">
                    </div>

                    <div class="rTableHead"style="text-align: left;width:15%;background-color:#FFFF99"><strong>NAČIN OTPREME:</strong>
                          {{Form::text('nacin_otpreme',$order->nacin_otpreme,['class'=>'form-control',])}}
                    </div>
                </div>
            </div>  
--}} 

        <div class="rTableRow">
                <div class="rTableCell" style="border: 0px">

                        {{Form::label('nacin_placanja','Našu narudžbu platit ćemo: ')}}
                        {{Form::text('rok',$order->rok,['class'=>'form-control','style'=>'width:200px'])}} 
                </div>
        <br>
        <div class="rTableCell" style="border: 0px">

            {{Form::label('nacin_placanja','Način plaćanja: ')}}
            {{Form::select('nacin_placanja',$placanje,$order->nacin_placanja)}} 
        </div>
                </div>
        <br>
        <div class="rTableRow">

        <div class="rTableCell" style="border: 0px">
            Narudžbu sastavio:
            {{Form::text('sastavio',$order->sastavio,['class'=>'form-control','style'=>'width:200px'])}}
        </div>
        <div class="rTableCell" style="border: 0px">

            Narudžbu odobrio:
            {{Form::text('odobrio',$order->odobrio,['class'=>'form-control','style'=>'width:200px'])}}
        </div>
        </div>

        <div class="rTableCell" style="border: 0px">
                Napomena:
                {{Form::textarea('napomena',$order->napomena,['class'=>'form-control','rows="" cols="150"'])}}
            </div></div>


    </div>
 </div>
</div>    <br>

            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Unesi promijene',['class'=>'btn btn-primary','name'=>'uneseno','style'=>' margin-left: 48%'])}} 
            {!! Form::close() !!}
    
        <br><br>

@endsection


