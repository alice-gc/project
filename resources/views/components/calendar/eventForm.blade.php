
 @section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/js/bootstrap-colorpicker.min.js"></script>  
@endsection

<form action="{{ route('calendar.store') }}" method="POST" class="form-horizontal input-group-sm"> 
      @csrf

      <div class="form-group row">
      <div class="col-sm-6">
            <label for="eventTitle" class="col-form-label">Event Title:</label>
      </div>
      <div class="col-sm-6">
            <input type="text" name="eventTitle" class="form-control" id="eventTitle" placeholder="Title">
      </div>
      </div>
      
@if($errors->has('eventTitle'))
    <div class="error alert alert-danger">{{ $errors->first('eventTitle') }}</div>
@endif
      <div class="form-group row">
      <div class="col-sm-6">
            <label for="description" class="col-form-label">Description:</label>
      </div>
      <div class="col-sm-6">
            <input type="text" name="description" class="form-control" id="description" placeholder="*additional">
      </div>
      </div>
      <div class="form-group row">
      <div class="col-sm-6">
            <label for="category_id" class="col-form-label">Timeblock: presetCategory</label>
      </div>
      <!-- <category-color-picker :categories="{!! $categories !!}" > -->
      <div class="col-6">
            <select name="presetCategory" class="form-select" aria-label="Default select example">
            <!-- <option selected></option> -->
                  @foreach($categories as $category)
                        <option data-color="{{ $category->color }}" value="{{ $category->id }}" > {{ $category->categoryName }} </option>
                  @endforeach
            </select>
      </div>
      </div>
      <div class="form-group row">
      <div class="col-sm-6">
            <label for="category_id" class="col-form-label">Color</label>
      </div>
      <div class="col-sm-6">

                  <input type="text" name="color" class="form-control" id="color" placeholder="*default">
<script>
  $(function () {
    $('#color').colorpicker();
  });
</script>

      </div>
      </div>
      <input type="hidden" value="{{ $user }}" name="user_id">



      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-outline-danger shadow" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger shadow">Save</button>
      </div>
</form> 


<!-- <script>
      var colorPicker = document.getElementById("color");
      document.addEventListener('DOMContentLoaded', init, false);
      function init(){
      function message () {
      var colorSelected = document.getElementById("colorSelection").innerHTML = colorPicker.value;
      }
      var colorPicker = document.getElementById("color");
      colorPicker.addEventListener('click', message, true);
      };

</script> -->

