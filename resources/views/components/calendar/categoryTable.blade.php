<table class="table table-bordered shadow" style="table-layout:fixed;width:100%;">
    <thead>
        <tr>
            <th>Name:</th>
            <th>Color:</th>
            <th>StartTime:</th>
            <th>EndTime:</th>
            <!-- <th>Day:</th> -->
        </tr>
    </thead>
    <tbody> 
        @foreach ($categories as $category)
        <tr>
            <td> {{ $category->categoryName }}</td>
            <td> {{ $category->categoryColor }}</td>
            <td> {{ $category->categoryStartTime }}</td>
            <td> {{ $category->categoryEndTime }}</td>
            <!-- <td> {{ $category->categoryName }}</td> -->
        </tr>
        @endforeach
    </tbody>

</table>