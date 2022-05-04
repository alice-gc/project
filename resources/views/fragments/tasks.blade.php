@extends('layouts.main')
@section('content')
 
@section('contentGuest')
  <p>This is task page</p>
  <p> Please log in to your tasks </p>
@endsection



@section('contentUser')

  <kamban-board :initial-data="{{ $tasks }}"></kamban-board>
  
@endsection

