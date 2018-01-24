<?php
  include('header_admin.php');
?>

<script>
$(document).ready(function() {
  $('#field').on('change.div1', function() {
    $("#emp").toggle($(this).val() == 'div1');
     $("#leave").toggle($(this).val() == 'div2');
  }).trigger('change.states');
});
</script>

<script>
$(function() {
    $( "#field1" ).autocomplete({
        source: 'search.php'
    });
});
</script>

<script type="text/javascript">
        $(function() {
  var start_year = new Date().getFullYear();

  for (var i = start_year; i > start_year - 2; i--) {
    $(".year").append('<option value="' + i + '">' + i + '</option>');
  }
});
    </script>

<div class="row" >
  <div class="well" id="headingwell">
  <h3 id="headingdash">Generate Leave Report</h3>
  </div>
  <div class="well" id="contentwell">
  <div class="row">
  <div class="col-md-3">
  <label>Generate For :</label>
  </div>
  <div class="col-md-9">
  <select class="form-control" id="field" name="sel">
    <option disabled="disabled" selected="selected">-----Select-----</option>
    <option value="div1">Employee</option>
    <option value="div2">Leave Type</option>
  </select>
  </div>
  </div>
</div>
</div><br>

<div class="row" name="div1" id="emp" style="display:none">
  <div class="well" id="headingwell">
  <h3 id="headingdash">Fetch Leaves</h3>
  </div>
  <div class="well" id="contentwell">
  <form method="post">
  <table class="table table-striped">
    <thead>
      <tr>
<th>Employee Name </th>
<th>Leave Type</th>
<th>Year</th>
</tr>
</thead>
<tbody>
<tr>
<td><input class="form-control" id="field1" name="emp_name"></td>
<td><?php 
  $sql="select * from tekhub_leaves";
  $retval=mysqli_query($conn,$sql);
  if(!$retval){
  die('could not enter data:'.mysqli_error());
  }
  echo"
 <select id='field1' class='form-control'  name='leave_type'  required>
    <option disabled='disabled' selected='selected'>-----Select----</option>
  <option value='0'>All</option>";
  while($row= mysqli_fetch_array($retval)){
  $leave_id=$row['leave_id'];
  $leave_type=$row['leave_type'];
 echo" <option value=".$leave_id.">". $leave_type . "</option>";
  }
    echo" </select>";
  ?></td>
<td><select name="year" class="form-control year" id="field1"  ></select></td>
      </tr>
    
    </tbody>
</table>
<hr>
<input type="submit" name="sub1" class="btn" value="Submit" >
</form>
</div>
</div>

<div class="row" name="div2" id="leave" style="display:none">
  <div class="well" id="headingwell">
  <h3 id="headingdash">Fetch Leaves</h3>
  </div>
  
<div class="well" id="contentwell">
  <form method="post">
  
    <table><tr><th><label>Leave Type&emsp;</label></th>
   <td>
  <?php 
  $sql="select * from tekhub_leaves";
  $retval=mysqli_query($conn,$sql);
  if(!$retval){
  die('could not enter data:'.mysqli_error());
  }
  echo"
 <select  id='field' name='leave_type' required>
 
    <option  selected='true' disabled='disabled'>-----Select----</option>";
//	<option value='0'>All</option>";
  while($row= mysqli_fetch_array($retval)){
  $leave_id=$row['leave_id'];
  $leave_type=$row['leave_type'];
 echo" <option value=".$leave_id.">". $leave_type . "</option>";
  }
    echo" </select>
  
  ";	echo"</td><th><label>&emsp;&emsp;&emsp;Year&emsp;</label></th><td>";
  
 
		$sqlforyear="SELECT DISTINCT year(year) as olydate FROM  tekhub_user_leave";
		$retvalforyear=mysqli_query($conn,$sqlforyear);
		if(!$retvalforyear){
      die('could not enter data:'.mysqli_error());
                }
		echo "<select class='form-control' id='field' name='year1' required> <option>select </option>";		
		while($row1= mysqli_fetch_array($retvalforyear))
		{  $year=$row1['olydate'];
		echo"
		<option>$year </option>";
        }
         echo"
      </select></td></tr></table>";  
  ?> </br>
<input type="submit" name="sub2" class="btn" value="Submit">
</form>
</div>
</div><br>

<br><hr id="hrline">

<div class="row" id="leave_div">
  <div class="well" id="headingwell">
  <h3 id="headingdash">Leave Details</h3>
  </div>

  <div class="well" id="contentwell">
<?php
if (isset($_POST['sub1'])) 
{    
	 $emp_name1=$_POST['emp_name'];	
//echo $id=$_POST['id'];
 $year1=$_POST['year'];
$leave_type=$_POST['leave_type'];
$sql_for_id ="SELECT * FROM `tekhub_employee_personal_details` WHERE emp_name='$emp_name1'";
  $retval1=mysqli_query($conn,$sql_for_id);
  if(!$retval1)
  {
die('Could not fetch data: ' . mysqli_error($conn));
  }


while($row= mysqli_fetch_array($retval1,MYSQLI_ASSOC))
{
    $emp_id=$row['emp_id'];

}    echo "<table class='table table-bordered view'>
    <thead>
      <tr bgcolor='	#A52A2A'>
	  <th><font color='#ffffff'>Employee Name</font></th>
        <th><font color='#ffffff'>Employee Id</font></th>
        
		<th><font color='#ffffff'>Leave Type</font></th><th><font color='#ffffff'>Leave Entitile</font></th>
        <th><font color='#ffffff'>Leave Balance</font></th>
      </tr>
    </thead>
    <tbody>";
     if($leave_type==0)
{
	$sql1="SELECT * FROM `tekhub_leaves` as a
	INNER join tekhub_user_leave as b on a.leave_id=b.leave_id 
	INNER JOIN tekhub_employee_personal_details as d on d.emp_id=b.emp_id
	WHERE b.emp_id='$emp_id'  and year(b.year)='$year1' GROUP BY b.leave_id";
/*	SELECT * FROM `tekhub_leaves` as a 
	INNER join tekhub_user_leave as b on 
	a.leave_id=b.leave_id INNER JOIN tekhub_apply_leave
	as c on a.leave_id=c.leave_id and c.emp_id=b.emp_id INNER 
	JOIN tekhub_employee_personal_details as d on d.emp_id=c.emp_id 
	WHERE c.emp_id='$emp_id' and year(c.date_created)=$year1 GROUP BY c.leave_id"; */
	
	$retval1=mysqli_query($conn,$sql1);
	$count=mysqli_num_rows($retval1);
	if($count>=1)
	{}

else {echo '<script language="javascript"> alert("NO Data found")</script>';}

	if(!$retval1) 
		{  
die('Could not fetch data: ' . mysqli_error($conn));
         }
  while($row= mysqli_fetch_array($retval1,MYSQLI_ASSOC))
     {  

      	  echo"
	 <tr><td>{$row['emp_name']}</td>
<td>{$row['emp_id']} </td>


<td>{$row['leave_type']}</td><td>{$row['leave_entitlements']}</td><td>{$row['leave_balance']}</td>      </tr>";

	 }//while end
	 echo "</tbody></table>";
	 }//if end
	 else
	 {
		 $sql1="SELECT * FROM `tekhub_leaves` as a 
		 INNER join tekhub_user_leave as b on a.leave_id=b.leave_id 
		 INNER JOIN tekhub_employee_personal_details as d on d.emp_id=b.emp_id 
		 WHERE b.emp_id='$emp_id' and year(b.year)=$year1 and b.leave_id='$leave_type'";
	/*$sql1="SELECT * FROM `tekhub_leaves` as a 
	INNER join tekhub_user_leave as b on 
	a.leave_id=b.leave_id INNER JOIN tekhub_apply_leave
	as c on a.leave_id=c.leave_id and c.emp_id=b.emp_id INNER 
	JOIN tekhub_employee_personal_details as d on d.emp_id=c.emp_id 
	WHERE c.emp_id='$emp_id' and year(c.date_created)=$year1 and a.leave_id='$leave_type' GROUP BY c.leave_id"; */
	
	$retval1=mysqli_query($conn,$sql1);
	$count=mysqli_num_rows($retval1);
	if($count>=1)
	{}

else {echo '<script language="javascript"> alert("NO Data found")</script>';}

	if(!$retval1) 
		{  
die('Could not fetch data: ' . mysqli_error($conn));
         }
  while($row= mysqli_fetch_array($retval1,MYSQLI_ASSOC))
     {  
      	  echo "
	 <tr><td>{$row['emp_name']}</td>
<td>{$row['emp_id']} </td>

<td>{$row['leave_entitlements']}</td>
<td>{$row['leave_type']}</td><td>{$row['leave_balance']}</td>      </tr>";

	 }//while end
	 echo "</tbody></table>";
	 }
}

elseif (isset($_POST['sub2'])) 
{ 

$leave_type=$_POST['leave_type'];
$year1=$_POST['year1'];
 $leave_type;
 
/*$sql = "Select * from tekhub_user_leave as A inner join tekhub_employee_personal_details as B on A.emp_id=B.emp_id INNER 
JOIN tekhub_leaves as c on c.leave_id=A.leave_id where c.leave_id='$leave_type'"; */
$sql="Select * from tekhub_user_leave as A inner join tekhub_employee_personal_details as B on A.emp_id=B.emp_id INNER 
JOIN tekhub_leaves as c on c.leave_id=A.leave_id where c.leave_id='$leave_type' and year(A.year)='$year1'";

  $retval=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($retval);
	if($count>=1)
{
		
		if(!$retval)
      {
die('Could not fetch data: ' . mysqli_error($conn));
      }
    echo "<table class='table table-bordered view'>
    <thead>
      <tr bgcolor='	#A52A2A'>
	  <th><font color='#ffffff'>Employee Name<font></th>
        <th><font color='#ffffff'>Employee Id<font></th>
        
		<th><font color='#ffffff'>Leave Type</font></th><th><font color='#ffffff'>Leave Entitile</font></th>
        <th><font color='#ffffff'>Leave Balance</font></th>
      </tr>
    </thead>
    <tbody>";
    while($row1= mysqli_fetch_array($retval,MYSQLI_ASSOC))
	{  $emp_id_no_of_days=$row1['emp_id'];
     
	
	 
echo "<tr>
        <td>{$row1['emp_name']}</td><td> {$row1['emp_id']} </td>
		<td>{$row1['leave_type']}</td><td>{$row1['leave_entitlements']}</td>
        <td>{$row1['leave_balance']}</td>";
       
      echo "</tr>";
	}
	}
	else
	{
  echo '<script language="javascript"> alert("Result Not found")</script>';
	}

    echo "</tbody>
  </table>";
}
 mysqli_close($conn);
  ?>
  </div>
</div>

<?php
  include('footer.php');
?>