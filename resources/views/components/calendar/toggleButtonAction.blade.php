
@if($errors->any())
<script>
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>
@endif


<!-- Button trigger modal -->
<button type="button" class="btn  btn-outline-danger button-toggle-modal shadow" data-toggle="modal" data-target="#myModal">
  Add Activity
</button>

<!-- Modal -->
<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="container-fluid">
        <div class="row">
          <div class="col">
             <div id="hEvent">
                <p class="modal_title">
                   <strong> Add Event </strong>
                </p>
            </div>
              <div id="hCategory" style="display:none;">
                <p class="modal_title">
                 <strong>Add Timeblock </strong>
                </p>
            </div>
          </div>
          
          <div class="col">

          <a href=" " type="button" class="closebtn close close_toggal" data-dismiss="modal" aria-label="Close">
                            <!-- black sircle empty inside -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                              <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"
                              />
                            </svg>

                            <!-- empty x on circle -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-x-circle" viewBox="0 0 16 16">
                              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                              <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                              />
                            </svg>
                          </a>
                          </div>
                          </div>
                          <div class="row">
                            <div class="col">
                    
        <!-- <h5 class="modal-title" id="exampleModalLabel">Add </h5> -->

        <div class="btn-group">
          <button type="button" class="btn btn-outline-danger rounded-pill toggle-button" data-mdb-ripple-color="dark" onclick="myFunction()">Event</button>
          <button type="button" class="btn btn-outline-danger rounded-pill toggle-button" data-mdb-ripple-color="dark" onclick="myFunction()">Timeblock</button>
        </div>
          </div>
  </div>
      </div>
  </div>

      <div class="modal-body">
      <div id="eventForm">
        <p>
          <!-- include calendar form for events -->
          @include('components.calendar.eventForm')
        </p>
      </div>
      <div id="categoryForm" style="display:none;">
      <p>
       <!-- include calendar form for category -->
        @include('components.calendar.categoryForm')
      </p>
      </div>

      <script>
      function myFunction() {
        var event = document.getElementById("eventForm"); 
        var hEvent = document.getElementById("hEvent");
                
        var category = document.getElementById("categoryForm");
        var hCategory = document.getElementById("hCategory");

        event.style.display = (
            event.style.display == "none" ? "block" : "none"); 
   
        hEvent.style.display = (
            hEvent.style.display == "none" ? "block" : "none"); 

        category.style.display = (
            category.style.display == "none" ? "block" : "none"); 
   
        hCategory.style.display = (
            hCategory.style.display == "none" ? "block" : "none"); 
      }
      </script>

      </div>

    </div>
  </div>
</div>


