  <!-- <script href="{{ asset('js/script.js') }}"></script> -->
<!-- <div class='table-responsive'> -->
<table id="infoTable" class="table table-bordered table-hover shadow" style="table-layout:fixed;width:100%;">

<thead>
<tr>
  <th>Name</th>
  <th>Housing</th>
  <th>Food</th>
  <th>Transportation</th>
  <th>Personal Expenses</th>
  <th>Entertainment</th>
  <th> # </th>
  </tr>
</thead>

<tbody>
@foreach ($budget as $val)
<tr class="clickableRow">
  <td class='name'>{{ $val->name }}</td>
  <td class='house'>{{ $val->house }}</td>
  <td>{{ $val->food }}</td>
  <td>{{ $val->transport }}</td>
  <td>{{ $val->personal }}</td>
  <td>{{ $val->entertainment }}</td>
  <!-- <td>{{ $val->id }}</td> -->
  <td>  
    <form method="GET" action="{{ route('budget.destroy', $val->id) }} ">
            {{ csrf_field() }}
      <button type="submit" class="btn btn-danger delete-entry shadow btn-block" value="DELETE" >Delete entry</button>
    </form>
  </td>


</tr>
@endforeach
</tbody>
</table>
