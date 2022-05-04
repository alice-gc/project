


<form action="{{ route('calendar.store') }}" method="POST" class="form-horizontal input-group-sm"> 
@csrf
  <div class="form-group row">
    <div class="col-sm-6">
        <label for="categoryName" class="col-form-label">Time Block Label:</label>
    </div>
    <div class="col-sm-6">
      <input type="text" name="categoryName" class="form-control" id="categoryName" placeholder="Label">
    </div>
  </div>

  @if($errors->has('categoryName'))
    <div class="error alert alert-danger">{{ $errors->first('categoryName') }}</div>
@endif
  <div class="form-group row">
    <div class="col-sm-6">
        <label for="categoryColor" class="col-form-label">Block color</label>
    </div>
    <div class="col-sm-6 container-fluid">
      <div class="row input-group colorpicker-component" id="color-picker-component"  name="categoryColor">
      

          <div class="col-10">
        <input type="text" placeholder="#38a677" class="form-control" name="categoryColor" id="categoryColor" />

          </div>
          <div class="col-2 color-picker-box" style="background-color:whitesmoke">
            <span class="input-group-addon"><i></i></span>
          </div>
              <script>
                  $(function () {
                    $('#color-picker-component').colorpicker();
                  });
                </script>
      </div>
  </div>
  </div>
  @if($errors->has('categoryColor'))
    <div class="error alert alert-danger">{{ $errors->first('categoryColor') }}</div>
@endif
  <div class="form-group row">
    <div class="col-sm-6">
        <label for="categoryStartTime" class="col-form-label">Start time</label>
    </div>
    <div class="col-6">
       <select name="categoryStartTime" class="form-select">

                        <option value="0" >00:00</option>
                        <option value="1" >01:00</option>
                        <option value="2" >02:00</option>
                        <option value="3" >03:00</option>
                        <option value="4" >04:00</option>
                        <option value="5" >05:00</option>
                        <option value="6" >06:00</option>
                        <option value="7" >07:00</option>

                        <option value="8" >08:00</option>
                        <option value="9" >09:00</option>
                        <option value="10" >10:00</option>
                        <option value="11" >11:00</option>
                        <option value="12" >12:00</option>
                        <option value="13" >13:00</option>
                        <option value="14" >14:00</option>
                        <option value="15" >15:00</option>
                        <option value="16" >16:00</option>


                        <option value="17" >17:00</option>
                        <option value="18" >18:00</option>
                        <option value="19" >19:00</option>
                        <option value="20" >20:00</option>
                        <option value="21" >21:00</option>
                        <option value="22" >22:00</option>
                        <option value="23" >23:00</option>
            </select>
    </div>
  </div>
    @if($errors->has('categoryStartTime'))
    <div class="error alert alert-danger">{{ $errors->first('categoryStartTime') }}</div>
@endif
    
 <div class="form-group row">
      <div class="col-sm-6">
            <label for="categoryEndTime" class="col-form-label">End time: </label>
      </div>
      <div class="col-6">
             <select name="categoryEndTime" class="form-select">

                        <option value="0" >00:00</option>
                        <option value="1" >01:00</option>
                        <option value="2" >02:00</option>
                        <option value="3" >03:00</option>
                        <option value="4" >04:00</option>
                        <option value="5" >05:00</option>
                        <option value="6" >06:00</option>
                        <option value="7" >07:00</option>

                        <option value="8" >08:00</option>
                        <option value="9" >09:00</option>
                        <option value="10" >10:00</option>
                        <option value="11" >11:00</option>
                        <option value="12" >12:00</option>
                        <option value="13" >13:00</option>
                        <option value="14" >14:00</option>
                        <option value="15" >15:00</option>
                        <option value="16" >16:00</option>


                        <option value="17" >17:00</option>
                        <option value="18" >18:00</option>
                        <option value="19" >19:00</option>
                        <option value="20" >20:00</option>
                        <option value="21" >21:00</option>
                        <option value="22" >22:00</option>
                        <option value="23" >23:00</option>
            </select>
      </div>
    </div>
    @if($errors->has('categoryEndTime'))
    <div class="error alert alert-danger">{{ $errors->first('categoryEndTime') }}</div>
@endif
 <div class="form-group row">
      <div class="col-sm-6">
            <label for="timetable_id" class="col-form-label">Day: </label>
      </div>
      <div class="col-6">
             <select name="timetable_id" class="form-select">
                  @foreach($days as $day)
                        <option value="{{ $day->id }}" >{{ $day->title }} </option>
                  @endforeach
            </select>
      </div>
    </div>


    <input type="hidden" value="{{ $user }}" name="user_id">


      <div class="modal-footer  d-flex justify-content-center">
        <button type="button" class="btn btn-outline-danger shadow" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger shadow">Save</button>
      </div>

  </form> 

