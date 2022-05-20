<form  action="" method="POST" class="form-horizontal input-group-sm">
    @csrf
  <div class="form-group row">
    <div class="col-sm-6">
        <label for="name" class="col-form-label">Name</label>
    </div>
    <div class="col-sm-6">
      <input type="text" name="name" class="form-control" id="name" value="My Personal Budget" placeholder="Enter the name">
    </div>
  </div>
    @if($errors->has('name'))
    <div class="error alert alert-danger">{{ $errors->first('name') }}</div>
@endif

  <div class="form-group row">
    <div class="col-sm-6">
        <label for="income" class="col-form-label">total monthly income</label>
    </div>
    <div class="col-sm-6">
      <input type="text" name="income" class="form-control" id="income" value="1500" placeholder="Enter the income number">
    </div>
  </div>
    @if($errors->has('name'))
    <div class="error alert alert-danger">{{ $errors->first('name') }}</div>
@endif
   <hr>
  <div class="form-group row">
    <div class="col-6">
        <label for="house" class="col-form-label">Rent or Mortage: 25-35</label>
    </div>
    <div class="col-sm-2">
      <input type="numeric" name="house" class="form-control" id="house" value="25" placeholder="house">
    </div>
        <div class="col-sm-1">
        %
        </div>
        <div class="col-sm-2">
      <input type="numeric" name="house" class="form-control" id="house" value="25" placeholder="house" readonly>
    </div>
            <div class="col-sm-1">
        @
        </div>
  </div>
      @if($errors->has('house'))
    <div class="error alert alert-danger">{{ $errors->first('house') }}</div>
@endif
    <div class="form-group row">
    <div class="col-sm-8">
        <label for="food" class="col-form-label">FOOD: 5-15%</label>
    </div>
    <div class="col-sm-4">
      <input type="numeric" name="food" class="form-control" id="food" value="25" placeholder="food">
    </div>
  </div>
        @if($errors->has('food'))
    <div class="error alert alert-danger">{{ $errors->first('food') }}</div>
@endif
    <div class="form-group row">
    <div class="col-sm-8">
        <label for="transport" class="col-form-label">TRANSPORTATION: 10-15%</label>
    </div>
    <div class="col-sm-4">
      <input type="numeric" name="transport" class="form-control" id="transport" value="25" placeholder="transport">
    </div>
  </div>
        @if($errors->has('transport'))
    <div class="error alert alert-danger">{{ $errors->first('transport') }}</div>
@endif
    <div class="form-group row">
    <div class="col-sm-8">
        <label for="personal" class="col-form-label">PERSONAL EXPENSES: 5-10%</label>
    </div>
    <div class="col-sm-4">
      <input type="numeric" name="personal" class="form-control" id="personal" value="25" placeholder="personal expenses">
    </div>
  </div>
        @if($errors->has('personal'))
    <div class="error alert alert-danger">{{ $errors->first('personal') }}</div>
@endif
    <div class="form-group row">
    <div class="col-sm-8">
        <label for="entertainment" class="col-form-label">ENTERTAINMENT: 5-10%</label>
    </div>
    <div class="col-sm-4">
      <input type="numeric" name="entertainment" class="form-control" id="entertainment" value="25" placeholder="entertainment">
    </div>
  </div>
        @if($errors->has('entertainment'))
    <div class="error alert alert-danger">{{ $errors->first('entertainment') }}</div>
        @endif
 <div class="form-group row">
    <div class="col-sm-8">
        <label for="savings" class="col-form-label">Savings: > 10%</label>
    </div>
    <div class="col-sm-4">
      <input type="numeric" name="savings" class="form-control" id="savings" value="25" placeholder="savings" readonly>
    </div>
  </div>
        @if($errors->has('entertainment'))
    <div class="error alert alert-danger">{{ $errors->first('entertainment') }}</div>
        @endif
    <div class="form-group row">
    <div class="col-sm-8">
        <label for="default" class="col-form-label">Default expense: </label>
    </div>
    <div class="col-sm-4">
      <input type="numeric" name="default" class="form-control" id="default" value="25" placeholder="additional expenses">
    </div>
  </div>
        @if($errors->has('default'))
    <div class="error alert alert-danger">{{ $errors->first('default') }}</div>
@endif
      <input type="hidden" value="{{ $user }}" name="user_id">
  <div class="form-group row">
    <div class="col text-center">
      <button type="submit" class="btn btn-outline-danger shadow" >Save</button>
    </div>
  </div>
</form>