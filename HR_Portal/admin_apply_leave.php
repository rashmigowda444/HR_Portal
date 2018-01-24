<?php
  include('header_admin.php');
?>

<div class="row" >
  <div class="well" id="headingwell">
  <h3 id="headingdash">Apply Leave</h3>
  </div>

<div class="well" id="contentwell">
<form method="post" action="<?php $_PHP_SELF ?>">

<div class="row" >
  <div class="col-md-2">
  <label> Emp Id </label>
  </div>
  <div class="col-md-10">
  <input name="id" type="text" id="field" required>
  </div>
 </div><br>

  <div class="row">
  <div class="col-md-2">
  <label>Leave Type  </label>
  </div>
  <?php 
  $sql="select * from tekhub_leaves";
  $retval=mysqli_query($conn,$sql);
  if(!$retval){
  die('could not enter data:'.mysqli_error());
  }
  echo"<div class='col-md-10'>
 <select  id='field' onchange='showleave(this.value)' name='leave_type'  required>
    <option >-----Select----</option>";
  while($row= mysqli_fetch_array($retval)){
  $leave_id=$row['leave_id'];
  $leave_type=$row['leave_type'];
 echo" <option value=".$leave_id.">". $leave_type . "</option>";
  }
    echo" </select>
  </div>
  </div><br>";
  ?>
<div class="row"   id="rowduration">
  <div class="col-md-2">
  <label>Leave Balance </label>
  </div>
  <div class="col-md-10">
  <div name="leave_bal" id="txtHint"></div>
  </div>
  </div><br>

<div id="error"></div>

<div class="row" >
  <div class="col-md-2">
  <label> From Date </label>
  </div>
  <div class="col-md-10">
  <input name="fromdate"  id="datepicker1" type="text"  style="width:350px;" required>
  <span><img src="images/calendar.png" ></span>
  </div>
 </div><br>

<div class="row">
  <div class="col-md-2">
  <label>To Date </label>
  </div>
  <div class="col-md-10" id="colsel">
  <input name="todate"  id="datepicker2" type="text"  style="width:350px;"  required>
  <span><img src="images/calendar.png" ></span>
  </div>
  </div><br>


 <div id="txthin" name="no_days" ></div>
  
<div class="row">
  <div class="col-md-2">
  <label>Reason </label>
  </div>
  <div class="col-md-10">
  <textarea name="reason" id="field"  rows="4" cols="50"  required></textarea>
  </div>
  </div><br><br><hr id="hrbef">
  <input type="submit" id="btn"  value="Submit" name="submit" >
</form>

</div>
</div><br><hr id="hrline">


<?php
  include('footer.php');
?>
