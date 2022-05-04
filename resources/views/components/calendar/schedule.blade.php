<div class="table-wrapper-scroll-y my-custom-scrollbar shadow">
<table class="table table-bordered " style="table-layout:fixed;width:100%;">
  <thead>
    <tr> 
      <th scope="col">#</th>
      <th scope="col">Monday</th>
      <th scope="col">Tuesday</th>
      <th scope="col">Wednesday</th>
      <th scope="col">Thursday</th>
      <th scope="col">Friday</th>
      <th scope="col">Saturday</th>
      <th scope="col">Sunday</th>
    </tr>
  </thead>
  <tbody>
    
    <?php $arr = array(0, 1, 2, 3, 4, 5, 6, 7); ?>
    <?php $arr2 = array('00:00', '1:00', "2:00", "3:00", "4:00", "5:00", "6:00", "7:00", "8:00", "9:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00", "24:00"); ?>
    
    <!-- rows -->
    <?php foreach ($arr2 as $key1 => $value1) { ?> <tr>

        <!-- columns   7-->
        <?php foreach ($arr as $key => $value) { ?> <td> <?php 

            if ($key === array_key_first($arr2)) {
              echo $value1;
            }        
        ?> </td> <?php } ?>
      </tr> <?php } ?>

  </tbody>
</table>
          </div>

<table class="table table-bordered shadow">

    <tbody> 
        @foreach ($categories as $category)
        <tr>
            <td> {{ $category->categoryName }}</td>
            <td> {{ $category->categoryColor }}</td>
            <td> {{ $category->categoryStartTime }}</td>
            <td> {{ $category->categoryEndTime }}</td>
            <td> {{ $category->categoryDay }}</td>
        </tr>
        @endforeach
    </tbody>

</table>
