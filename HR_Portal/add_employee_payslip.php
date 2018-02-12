<?php
  include('header_admin.php');
date_default_timezone_set('GMT');
?>


<div class="row" >
  <div class="well" id="headingwell">
  <h3 id="headingdash">Add Employee</h3>
  </div>

 <div class="well" id="contentwell">
  <form method="post">
  <div class="row">
  <div class="col-md-3">
  <label>Employee Id :</label>
  </div>
  <div class="col-md-9">
  <input name="id" class="form-control" id="field" type="text" required>
  </div>
  </div><br>


  <div class="row">
  <div class="col-md-3">
  <label>Employee Name:</label>
  </div>
  <div class="col-md-9">
  <input name="name" class="form-control" id="field" type="text" required>
  </div>
  </div><br>

  <div class="row">
  <div class="col-md-3">
  <label>DOJ :</label>
  </div>
  <div class="col-md-9">
  <input name="doj"  class="form-control" id="datepicker" type="text"  
  style="width:350px;position:relative;border:none;" required>
  <span style="position:absolute;bottom:5px;left:370px;"><img src="images/calendar.png" ></span>
  </div>
  </div><br>


  <div class="row">
  <div class="col-md-3">
  <label>Department :</label>
  </div>
  <div class="col-md-9" >
  <select class="form-control" name="dept" id="field" required>
    <option>------Select------</option>
    <option value="IT">IT</option>
    <option value="HR">HR</option>
    <option value="R&D">R&D</option>
    <option value="Marketing">Marketing</option>
    <option value="Accounting">Accounting and Finance</option>
  </select>
  </div>
  </div><br>

  <div class="row">
  <div class="col-md-3">
  <label>Designation :</label>
  </div>
  <div class="col-md-9">
  <input name="designation" class="form-control" id="field" type="text" required>
  </div>
  </div><br>

  <div class="row">
  <div class="col-md-3">
  <label>PAN Number :</label>
  </div>
  <div class="col-md-9">
  <input name="pan" class="form-control" id="field" type="text" maxlength="10" required>
  </div>
  </div><br>
  
 
  <div class="row">
  <div class="col-md-3">
  <label>PF Number :</label>
  </div>
  <div class="col-md-9">
  <input name="pf" class="form-control" id="field" type="text">
  </div>
  </div><br>
 
 
  <div class="row">
  <div class="col-md-3">
  <label>Account Number :</label>
  </div>
  <div class="col-md-9">
  <input name="account" class="form-control" id="field" type="text" maxlength="12" required>
  </div>
  </div><br>
  
  <div class="row">
  <div class="col-md-3">
  <label>Basic Salary :</label>
  </div>
  <div class="col-md-9">
  <input name="basic" class="form-control" id="field" type="text" required>
  </div>
  </div><br>

  <div class="row">
  <div class="col-md-3">
  <label>Income Tax:</label>
  </div>
  <div class="col-md-9">
  <input name="income" class="form-control" id="field" type="text"  required>
  </div>
  </div><br>
<br><hr>
<button type="submit" id="btn" class="btn">Add Employee</button>&emsp;
<a href="admin_dashboard.php"><input type="button"  id="btn"  class="btn" value="Back"></input></a>
</form>

</div>
</div><br><hr id="hrline">

<?php
  include('footer.php');
?>
<?php
if(isset($_POST['id'])){
echo $id=$_POST['id'];
echo $name=$_POST['name'];
echo$doj= date('Y-m-d',strtotime($_POST['doj']));
echo $dept=$_POST['dept'];
echo $designation=$_POST['designation'];
echo $pan=$_POST['pan'];
echo $pf=$_POST['pf'];
//$work=$_POST['work'];
//$lop=$_POST['lop'];
echo $account=$_POST['account'];
echo $basic=$_POST['basic'];
echo $income=$_POST['income'];

$name1=$id1="";
if($name!=''&& $id!='')
{
$sql11="SELECT emp_name,emp_id FROM tekhub_add_employee where emp_name='$name' and emp_id='$id'";
$retval11=mysqli_query($conn,$sql11);
if(!$retval11)
{
die('could not enter data:'.mysqli_error($conn));
}
while($row11= mysqli_fetch_array($retval11)){
$name1=$row11['emp_name'];
$id1=$row11['emp_id'];
}

if($name1==$name && $id1==$id){
$sql="INSERT INTO tekhub_employee_personal_details(emp_id,emp_name,date_of_joining,department,designation) VALUES('$id1','$name1','$doj','$dept','$designation')";
$retval=mysqli_query($conn,$sql);
if(!$retval){
die('could not enter data1:'.mysqli_error($conn));
}

$sql3="INSERT INTO tekhub_employee_salary(emp_id,basic_salary,income_tax) VALUES('$id1','$basic',$income)";
$retval3=mysqli_query($conn,$sql3);
if(!$retval3){
die('could not enter data3:'.mysqli_error($conn));
}

$sql1="INSERT INTO tekhub_employee_bank_details(emp_id,pan_number,pf_number,account_number)
VALUES('$id1','$pan','$pf','$account')";
$retval1=mysqli_query($conn,$sql1);
if(!$retval1){
die('could not enter data2:'.mysqli_error($conn));
}
else{
echo '<script language="javascript"> alert("Added successfully")</script>';
}
}
else{
echo '<script language="javascript"> alert("error")</script>';
}
}

}
mysqli_close($conn);
?>

