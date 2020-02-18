@extends('layouts.app')
@section('content')
<?php use App\Order; ?>

<br>
        <link rel="stylesheet" href="{{ URL::asset('css/mycss.css') }}" >
  

        <h1> Pregled svih narudžbenica </h1><br>

       <div class="well">
            <a href="{{ url('orders2020') }}">2020.</a>
        </div>

        <div class="well">
            <a href="{{ url('orders2019') }}">2019.</a>
        </div>

@endsection