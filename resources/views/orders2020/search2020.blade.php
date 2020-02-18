@extends('layouts.app')
@section('content')

<br>

    <a href="{{url('orders2020')}}" class="btn btn-primary" style="margin-left:20%">Natrag</a>
    <div  style = "width:50%" class="container">
        
        @if(isset($details) > 0)<br>
        <p style="font-size: 18px"> Rezultat za vašu pretragu <b> {{ $query }} </b> je :</p>
        <hr>
            @foreach($details as $order)

                <div class="well">
                 <h3><a href="{{url('orders2020')}}/{{$order->id}}">{{$order->naziv_prod}}</a></h3>
                Otvorena: {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}} <br>
                Narudžba br: {{$order->id}}<br>
                </div>
            <hr>
            @endforeach
        {{--$details->links()--}}
        @else
    <br>
        <p>Nema narudžbenica za pregled</p>
        @endif
@endsection