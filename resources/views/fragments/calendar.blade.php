@extends('layouts.main')
 
@section('contentGuest')
  <p>This is calendar page</p>
  <p> Please log in to see calendar </p>
@endsection

@section('contentUser')

     @if ($errors->any())
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert"> {{$error}}</div>
      @endforeach
  @endif

    <div class="row row_calendar">

      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 
      w-auto p-3">
      <!-- <div> {{ $categoriesTimetable}}</div> -->
       <calendar-table :initial-data="{{ $categoriesTimetable }}"> </calendar-template>
       
      </div>

      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4
       w-auto p-3 toggle_modal ">
        <div class="row">
          @include('components.calendar.toggleButtonAction')
        </div>
        
        <div class="row h-100 row-right-calendar gx-1 presets_card">
          <div class="card card_presets border-danger shadow presets_card">
            <div class="card-header">
              <h5 class="events">Events</h5>
            </div>
            <div class="card-body presets_card">
              <div class="table-wrapper-scroll-y my-custom-scrollbar2" style=" z-index: 1;">
                 @include('components.calendar.presets')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class='row row-data'>
    
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12
       d-flex justify-content-center">
        
        <p>
          <a class="btn btn-outline-secondary collapse-btn shadow colapse-btn-block" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Show events
          </a>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-body shadow">
              <!-- include Events placeholder -->
              @include('components.calendar.eventTable')  </div>
        </div>
      </div>
      
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12
       d-flex justify-content-center">
        <p>
          <a class="btn btn-outline-secondary shadow  colapse-btn-block" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
            Show Time blocks
          </a>
        </p>
        <div class="collapse" id="collapseExample2">
          <div class="card card-body shadow">
              <!-- include categories placeholder -->
              @include('components.calendar.categoryTable')  </div>
        </div>
      </div>


  </div>
@endsection