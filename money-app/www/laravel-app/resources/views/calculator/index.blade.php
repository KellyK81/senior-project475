@extends('master')
@section('body')
    @parent
    <div class="container">
    <html>
  
  <body>
      <h1>Retirement Calculator</h1>
      <form oninput="sumresult.value = ((parseInt(A.value) 
                  + parseInt(B.value)) * (parseFloat(C.value)/100)) + (parseInt(A.value) 
                  + parseInt(B.value))">
          <label for="Age">Current Age:</label>
          <input type="number" name="D" value="22" />
          <br>
          <label for="Retire">Retirement Age:</label>
          <input type="number" name="E" value="65" />
          <br>
          <label for="Savings">Current Savings:</label>
          <input type="number" name="A" value="50" />
          <br>
          <label for="Deposit">Annual Deposit:</label>
          <input type="number" name="B" value="5" />
          <br>
          <label for="Interest">Interest Rate:</label>
          <input type="number" name="C" value="4" />%
          <br>
        
          Total Retirement Savings: $<output name="sumresult"></output>
      </form>
  </body>
    
  </html>
    </div> 
@endsection