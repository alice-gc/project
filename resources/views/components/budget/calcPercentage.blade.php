<!-- 15$ how much % from salary 100 -->
   

<form action="" method="" class="form input-group-sm calculatePercentForm"> 
  <div class="mb-1">

        <label for="total">Total monthly income:</label>


      <input type="numeric" name="total" value='100' id='num1' class="form-control input-sm calculatePercent">

  </div>

    <div class="mb-1">

        <label for="fromNumber">How much is that in %:</label>

      <input type="numeric" name="fromNumber" value='15' id='num2' class="form-control input-sm calculatePercent">

  </div>
</form>

<p>=====: <div class="outputIncome">%</div>%</p>

 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>

        $(document).ready(function(){
            $("#val1, #val2, #val3, #val4, #val5").keyup(function(){
                // Getting the current value of textarea
                var currentText = ( 
                    $("#val1").val() +
                    $("#val2").val() +
                    $("#val3").val() +
                    $("#val4").val() +
                    $("#val5").val()        
                    
                    );
                
                // Setting the Div content
            
                $(".output").text(currentText);
            });

        // (number / base number) x 100
            $("#num1, #num2").keyup(function(){
                
                var percent = ( $("#num2").val() / $("#num1").val() ) * 100;
                
                // Setting the Div content
            
                $(".outputIncome").text(percent);
            });
        });
        </script>