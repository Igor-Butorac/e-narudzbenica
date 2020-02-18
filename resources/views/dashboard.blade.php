@extends('layouts.app')
@section('content')
<?php use App\User;
use App\Order;
use App\Order2019;
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Narudžbenice koje ste izradili</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <p style="font-size: 15px" >Dobro došli natrag {{ Auth::user()->name }} !</p>
                  
                    {{--@if(Auth::user()->type_of_user == 1)
                    <strong><a href="{{ url('register') }}" class="btn btn-primary">Registracija novih korisnika </a></strong>
                    @endif--}}
                

                    @if(count($orders) > 0)
                   <strong style="font-size:18px"> Vaše narudžbenice za 2020. godinu:</strong>
                    <br>
                    <table class="table table-striped">
                        <tr>
                            <th style="background-color:rgb(56, 193, 114)">Naziv narudžbenice</th>
                            <th style="background-color:rgb(56, 193, 114)">ID narudžbenice</th>
                        </tr>
                            <!--rgb(255, 255, 153 žuta ko na narudžbenici-->
                    @foreach($orders as $order)
                        <tr>
                            <th><a href="{{url('orders2020')}}/{{$order->id}}">{{$order->naziv_prod}}</th>
                            <th>{{$order->id}}</th>
                        </tr>
                    @endforeach
                    </table>
                    @else
                    Nemate još narudžbenica za 2020. godinu! <br>
                    @endif

                    <br>

                
                    @if(count($orders2019) > 0)
                    <strong style="font-size:18px"> Vaše narudžbenice za 2019. godinu:</strong>
                     <br>
                     <table class="table table-striped">
                         <tr>
                             <th style="background-color:rgb(56, 193, 114)">Naziv narudžbenice</th>
                             <th style="background-color:rgb(56, 193, 114)">ID narudžbenice</th>
                         </tr>
                             <!--rgb(255, 255, 153 žuta ko na narudžbenici-->
                     @foreach($orders2019 as $order2019)
                         <tr>
                             <th><a href="{{url('orders2019')}}/{{$order2019->id}}">{{$order2019->naziv_prod}}</th>
                             <th>{{$order2019->id}}</th>
                         </tr>
                     @endforeach
                     </table>
                     @else
                     Nemate još narudžbenica za 2019. godinu!
                     @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
