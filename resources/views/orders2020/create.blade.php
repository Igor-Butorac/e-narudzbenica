<?php use App\Department;?>
@extends('layouts.app')
@section('content')
<br>



<div style=" border-style: solid;
border-color: black;padding:5px; width:40%; margin-top:2%;
margin-left: 30%;background-color:#FFFF99;">

    <h1 style="text-align: center">Unesi novu narudžbenicu</h1> 

    <hr>

    {!! Form::open(['action' =>'Orders2020Controller@store','method'=>'POST','style'=>'width:auto%',]) !!}
    <div class="form-group">

        {{--Form::label('naziv','Naziv narudžbenice:')}}
        {{Form::text('naziv','',['class'=>'form-control','placeholder'=>'Unesite kratki naziv'])--}}

    </div>

    <div class="form-group">

        {{Form::label('nadnevak','Datum otvaranja narudžbenice:')}}
        {{Form::text('nadnevak',Carbon\Carbon::today()->format('d.m.Y'),['class'=>'form-control','readonly'])}}  

        {{--{{Form::date('nadnevak','',['class'=>'form-control',''])}}--}}

    <br>
        {{Form::label('rok_vazenja','Rok važenja/sklapanja:')}}
        {{Form::text('rok_vazenja','',['class'=>'form-control','id'=>'datetimepicker','format'=>'d-m-y'])}} 
        <!--Carbon\Carbon::today()->format('d-m-Y')-->
    </div>

    <hr>

    <div class="form-group">

        <h2>Isporučitelj (prodavatelj)</h2>

        {{Form::label('naziv_prod','Naziv - ime i prezime:')}}
        {{Form::text('naziv_prod','',['class'=>'form-control','placeholder'=>'Unesite prodavatelja'])}}

        {{Form::label('mjesto','Mjesto')}}
        {{Form::text('mjesto','',['class'=>'form-control','placeholder'=>'Unesite mjesto prodavatelja'])}}

        {{Form::label('ulica_br','Ulica prodavatelja:')}}
        {{Form::text('ulica_br','',['class'=>'form-control','placeholder'=>'Unesite naziv ulice prodavatelja'])}}

        {{Form::label('broj_tel','Broj tel. prodavatelja:')}}
        {{Form::text('broj_tel','',['class'=>'form-control','placeholder'=>'Unesite naziv ulice prodavatelja'])}}

        {{Form::label('oib','MB/OIB prodavatelja:')}}
        {{Form::text('oib','',['class'=>'form-control',])}}

     </div>

    <hr>

    <div class="form-group">

        {{Form::label('racun_prim','Žiro račun kupca(primatelja):')}}
        {{Form::number('racun_prim','',['class'=>'form-control',])}}

    </div>
           
    <div class="form-group">
       
  
        {{Form::label('zavod','Zavod: ')}}
        {{Form::select('zavod',$zavod,['class'=>"form-control"])}}

    </div>

        <hr>
{{--
    <div class="form-group">

        {{Form::label('naruc_dobra','NARUEČNA DOBRA USLUGE ISPORUČITE NA NASLOV:')}}
        {{Form::text('naruc_dobra','',['class'=>'form-control',])}}

        {{Form::label('rok_isporuke','ROK ISPORUKE:')}}
        {{Form::text('rok_isporuke','',['class'=>'form-control',])}}

        {{Form::label('nacin_otpreme','NAČIN OTPREME:')}}
        {{Form::text('nacin_otpreme','',['class'=>'form-control',])}}

    </div>
    --}}
    <div class="form-group">

        {{Form::label('rok','Našu narudžbu platit ćemo: ')}}
        {{Form::text('rok','',['class'=>'form-control'])}}

    </div>

    <div class="form-group">

        {{Form::label('nacin_placanja','Način plaćanja: ')}}
        {{Form::select('nacin_placanja',$placanje,['class'=>"form-control"])}}

    </div>

    
    <div class="form-group">

        {{Form::label('sastavio','Narudžbu sastavio/la')}}
        {{Form::text('sastavio','',['class'=>'form-control'])}}

    </div>

    <div class="form-group">

        {{Form::label('odobrio','Odobrio: ')}}
        {{Form::text('odobrio','',['class'=>'form-control'])}}

    </div>
</div>

    <br>

    {{Form::submit('Unesi narudžbenicu',['class'=>'btn btn-primary','name'=>'uneseno','style'=>'margin-left:30%'])}} 
    {!! Form::close() !!}

<br><br>

@endsection


