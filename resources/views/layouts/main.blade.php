<!DOCTYPE html>
<html lang="en">
    <head>
<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
        <title>Cup of Planning</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- CDNJS :: Sortable (https://cdnjs.com/) -->
        <script src="//cdn.jsdelivr.net/npm/sortablejs@1.10.2/Sortable.min.js"></script>
        <!-- CDNJS :: Vue.Draggable (https://cdnjs.com/) -->
        <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/4.0.0/vuedraggable.umd.min.js"></script> -->

        <!-- BOOTSTRAP ATACHMENT LINKS -->
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        @yield('head')
    </head>
    <body>
        <hr class="top">
        @include('fragments.navbar')
        
        <div class="container container_main shadow-lg" id="vue-app">
            @guest
                @yield('contentGuest')
            @else
                @yield('contentUser')
            @endguest

            @yield('content')
        </div>
       

    </body>

        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/js/bootstrap-colorpicker.min.js"></script>  
        <!-- <script src="/js/script.js"></script> -->


        <script src="{{ mix('/js/app.js') }}"></script>
        <script href="{{ asset('js/script.js') }}"></script>




</html>

