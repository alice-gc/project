<div class="card-container">
@foreach  ($events as $event)

  <button type="button" class="btn btn-dark btn-sm color" style="background-color: {{ $event->color }} ">
    <p class='preset_text'>
        <strong>{{ $event->eventTitle }}</strong><br>
        
      <!-- {{ $event->presetCategory }}

       {{ $event->color }} -->
      
      
      
    </p>
</button>
               <!-- {{ $event->description }} -->
               <!-- {{ $event->presetCategory }} -->
               <!-- {{ $event->color }} -->
               <!-- {{ $event->user_id }} -->


@endforeach
</div>

<!-- <style>
.btn-event{
    text-align: left;
    margin: 5%!important;
}
.color{
  margin: 1%!important;
}
.preset_text{
              color: white;
            font-size: 1vw;
            text-shadow: -1px 1px 0 #3b3b3b,
                          1px 1px 0 #3b3b3b,
                         1px -1px 0 #3b3b3b,
                        -1px -1px 0 #3b3b3b;
        }
}
  </style> -->
