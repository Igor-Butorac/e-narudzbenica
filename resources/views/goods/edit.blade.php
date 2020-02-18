<?php 
use App\Item;
?>

@extends('layouts.app')
@section('content')


    <div style=" border-style: solid;
    border-color: black;padding:5px; width:40%; margin-top: 4%;
    margin-left: 30%;background-color:#FFFF99;">

    <h1>Uredi naručenu stavku</h1>
    {!! Form::open(['action' =>['ItemsController@update',$items->id],'method'=>'POST','style'=>'width:50%',]) !!}
    
       
           <div class="form-group">

            <h3><i>NARUČUJEMO:</i></h3>

                {{Form::label('rb','Red. br.')}}
                {{Form::text('rb',$items->rb,['class'=>'form-control','readonly'])}}

                {{Form::label('naziv_dobra','Trgovački naziv dobra - usluge')}}
                {{Form::text('naziv_dobra',$items->naziv_dobra ,['class'=>'form-control','style'=>'width:400px'])}} 

                {{Form::label('jed_mjere','Jed. mjere')}}
                {{Form::text('jed_mjere',$items->jed_mjere,['class'=>'form-control'])}}

                {{Form::label('kolicina','Količina')}}
                {{Form::text('kolicina',$items->kolicina,['class'=>'form-control'])}}

                {{Form::label('cijena_bez_pdv','CIJENA(bez PDV-a)')}}
                {{Form::text('cijena_bez_pdv',$items->cijena_bez_pdv,['class'=>'form-control'])}}

                
                {{Form::label('pdv','PDV')}}
                {{Form::text('pdv',$items->pdv,['class'=>'form-control'])}}
            
                    
                {{--Form::hidden('iznos5x4','IZNOS 5X4')}}
                {{Form::hidden('iznos5x4',$items->iznos5x4,['class'=>'form-control'])--}}
                
            </div>
        </div>
  
    <br>
        
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Unesi promijene',['class'=>'btn btn-primary','name'=>'uneseno','style'=>'margin-left: 44.3%'])}} 
    {!! Form::close() !!}<br><br>

@endsection


