@extends('layouts.main')

@section('head')

    <style>

.sidebar {
  height: 50hv;
  width: 0;
  position: fixed;
  z-index: 1;
  left: -2%;
  background-color: whitesmoke;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 5%;

  border-radius: 0px 25px 25px 0px;
  border: 1px solid rgb(164, 48, 63);
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 5vw;

  display: block;
  transition: 0.3s;
}


.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
  color: rgb(164, 48, 63);
}

.openbtn {
  position: absolute;
  font-size: 20px;
  cursor: pointer;
  background-color: whitesmoke;
  color: white;

  border: none;

  height: 7%;
  width: 3%;
  left: 0;

    max-height:7%; max-width:3%;


  border-radius: 0px 15px 15px 0px;
  border: 1px solid  rgb(164, 48, 63);
    box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;


}
.openbtn:hover + .bi-percent {
  fill:white;
}

.closebtn {
    fill: rgb(164, 48, 63);
    width: 60px;
    } 

.openbtn:hover {
  background-color: rgb(164, 48, 63);
}

.bi-percent{
  fill: rgb(164, 48, 63);
  max-height:80%; 
  max-width:80%;
  min-height:80%!important; 
  min-width:80%!important;
  
}

.slide-button{
   float:left;
}
.bi-percent:hover{
  fill: white;
}

.text-bar{
  vertical-align: top;
  padding-top: 0px;

  padding-right: 10%;
  padding-left: 10%;

  /* margin-top: 100%; */
}



</style>
@endsection

@section('content')
    <!-- check if usr login -->
    @guest
        Please Login/Register to Add your own budget
        <li>                   
            <a href="{{ route('login') }}">Login</a>
        </li>
        <li>
            <a href="{{ route('register-user') }}">Register</a>
        </li>
    @else
    
      @include('components.budget.budgetSide')

        {{-- @include('fragments.original-budget') --}}

        <budget-vue> </budget-vue>

    @endguest
@endsection