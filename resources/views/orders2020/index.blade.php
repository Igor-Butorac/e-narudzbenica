@extends('layouts.app')
@section('content')
<?php use App\Order; ?>
<link rel="stylesheet" href="{{ URL::asset('css/mycss.css') }}" >

<br>
   
<h1 style="text-align: center"> Prikaz narudžbenica za 2020. godinu </h1><br><br>
        <form action="{{ url('search2020')}}" method="POST" role="search" name="q"  class="form-inline my-2 my-lg-0" style="margin: 0 auto;padding: 0px;">          
    
            {{ csrf_field() }}

        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Pretraži narudžbenice" name="q">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    
<br>

@if(count($orders) > 0)
    @foreach($orders as $order)
    <div class="well">
        
    <h3><a href="{{('orders2020')}}/{{$order->id}}">{{$order->id}}/20</a></h3>
    <strong>Naziv:</strong> {{$order->naziv_prod}}<br>
    <strong> Datum otvaranja narudžbenice:</strong> {{--$order->nadnevak--}} {{Carbon\Carbon::parse($order->created_at)->format('d-m-Y')}}
    </div>

    @endforeach

    {{$orders->links()}}

@else
    <p> Nema narudžbenica za pregled </p>
@endif

@endsection