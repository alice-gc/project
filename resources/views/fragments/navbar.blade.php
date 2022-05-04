
<!-- navbar --><!-- shadow -->
        <nav class="navbar navbar-light bg-light shadow p-0 mb-4 bg-white rounded ">
            <div class="container-fluid">
                <div class="row row-navbar">
                    <div class="col">
                        <a class="navbar-brand" href="{{route('homepage')}}">
                            <img src="/webRes/Untitled.png" width="185" height="35" class="d-inline-block align-top navbar_brand" alt="">
                        </a>
                    </div>

                    <div class="col">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            @foreach ($navbars as $navbarItem)
                            <ul class="nav-item">
                                <a  id="btn" class="btn btn-danger btn-sm navbar-btn d-flex justify-content-center" role="button" href="{{ route($navbarItem->route) }}">{{ $navbarItem->name }}</a>
                            </ul>
                            @endforeach
                        </div>
                    </div>

                    <div class="col">
                        <div class="btn-group float-right" role="group" aria-label="Basic example">
                            @guest
                                <ul class="nav-item"><a class="btn btn-danger btn-sm navbar-btn" role="button" href="{{ route('login') }}">Login</a></ul>
                                <ul class="nav-item"><a class="btn btn-danger btn-sm navbar-btn" role="button" href="{{ route('register-user') }}">Register</a></ul>
                            @else
                                 <ul class="nav-item"><a class="btn hello" href="#"> Hello {{ Auth::user()->name }} </a></ul>
                                <ul class="nav-item"><a class="btn btn-danger btn-sm navbar-btn" role="button" href="{{ route('signout') }}">Logout</a></ul>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>       
        </nav>
    <script>
        var button = document.getElementById('btn');
        button.addEventListener('click', myFunction);
        
        function myFunction() {
            document.getElementById("btn").style.color= "rgb(164, 48, 63)";
             document.getElementById("p2").style.color = "blue";

        }
    </script>
<!-- navbar end -->