<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
   <script>
 
/*
 $(document).ready(function(){
    $('#edit').on('show.bs.modal', function (event) {

     var button = $(event.relatedTarget)

     var itemid = button.data('item_id') 
     var rb = button.data('rb') 
     var order_id = button.data('order_id')
     var naziv_dobra = button.data('naziv_dobra')
     var jed_mjere = button.data('jed_mjere')
     var kolicina = button.data('kolicina')
     var cijena_bez_pdv = button.data('cijena_bez_pdv')
     var iznos5x4 = button.data('iznos5x4')

     var modal = $(this)
     modal.find('.modal-body #itemid').val(itemid)
     modal.find('.modal-body #rb').val(rb)
     modal.find('.modal-body #order_id').val(order_id)
     modal.find('.modal-body #naziv_dobra').val(naziv_dobra)
     modal.find('.modal-body #jed_mjere').val(jed_mjere)
     modal.find('.modal-body #kolicina').val(kolicina)
     modal.find('.modal-body #cijena_bez_pdv').val(cijena_bez_pdv)
     modal.find('.modal-body #iznos5x4').val(iznos5x4)
   })
   
});
*/
</script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        

            @include('inc.navbar')
            <div class="container">
            @include('inc.messages')
            @yield('content')
            </div>
    </div>
</body>
</html>
