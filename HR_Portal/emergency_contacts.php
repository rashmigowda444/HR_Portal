<?php
  include('header.php');
 
?>
<style>
.field_for{
  width:350px;height:35px;border-radius:5px;border:none;background-color:white;
}
</style><script>
function myinfoedit()
 {   
	   document.getElementById("name1").disabled=false;
	   document.getElementById("name1").style.backgroundColor = "#ffffff";
	   
	   document.getElementById("relationship").disabled=false;
	   document.getElementById("relationship").style.backgroundColor = "#ffffff";
	   
	   document.getElementById("hometele").disabled=false;
	   document.getElementById("hometele").style.backgroundColor = "#ffffff";
	   
	   document.getElementById("mobilenor").disabled=false;
	   document.getElementById("mobilenor").style.backgroundColor = "#ffffff";
	   
	   document.getElementById("worknor").disabled=false;
	   document.getElementById("worknor").style.backgroundColor = "#ffffff";
	   
	    
}
</script>
<?php
$id = $_SESSION['empid'];
$sql_select_from_db="select * from tekhub_contact_details where emp_id='$id' ";
$retval_from_db=mysqli_query($conn,$sql_select_from_db);
while($row_db=mysqli_fetch_array($retval_from_db))
{
  $ename_db=$row_db['ename']; 
  $erelationship_db=$row_db['erelationship'];
 $ehometele_db= $row_db['ehometele'];
  $emobile_db=$row_db['emobile'];
  $eworknor_db=$row_db['eworknor'];
}
?>
<!DOCTYPE html>
<html lang="en">
<body class="body">
<div id="divtop">
<ul id="ultopnav">
  <li id="litoplogo"><a href="index.php"><img src="images/logo.png" alt="Tekvity" height="70" width="250"></a></li>
  <li id="litopwelcome" class="dropdown">
  <a data-toggle="dropdown" style="text-decoration: none;">
  <?php
       if(isset($_SESSION['CurrentUser'])){
        echo 'Welcome '.'&nbsp;'.$_SESSION['CurrentUser'];
       }
       else{
       }
  ?><span class="caret"></span></button></a>

    <ul class="dropdown-menu">
     <li><a href="#">Change Password</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
     </li>
</ul>
</div><hr id="hrline"><br>

<div class="row" style="height:100%;">

<div class="col-md-3">
<div class="well" id="leftwell" >
<h3 class="headinginfo">
  <?php
        echo $_SESSION['CurrentUser'];      
	?>
</h3>

<div class="well" id="imgwell">
kk 	

<form action="#" method="post" enctype="multipart/form-data">
<input type="file" name="img[]" style="position:absolute;" multiple="multiple"/></br>
<input type="submit" name="upload" value="upload" style="position:absolute;">
</form>
<?php
if(isset($_POST['upload']))
{   echo    $_POST['upload'];
 $id = $_SESSION['empid'];
 $filename=$_FILES['img']['name'];
 
	 $tmpname=$_FILES['img']['tmp_name'];
	 //$size = getimagesize($tmpname);
	 $filetype=$_FILES['img']['type'];
	for($i=0;$i<=count($tmpname)-1;$i++)
	{	$name=addslashes($filename[$i]);
		$tmp=addslashes(file_get_contents($tmpname[$i]));
		$sql_select="select * from tekhub_employee_personal_details where emp_id='$id'";
		$returns=mysqli_query($conn,$sql_select);
	while($row=mysqli_fetch_array($returns))
{  $emp_id_db=$row['emp_id'];
} 
		if($emp_id_db!="")
		{
			$sql_update=" update tekhub_employee_personal_details set img='$tmp' where emp_id='$id' ";
		mysqli_query($conn,$sql_update);
		}
		
		//$sql="INSERT into img(name,image,emp_id)values('$name','$tmp','$id')";
		 		
	}
}
$res="select * from tekhub_employee_personal_details where emp_id='$id'";
$result1=mysqli_query($conn,$res);
while($row=mysqli_fetch_array($result1))
{	echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img']).'" width="260" height="250" style="border:2px solid #000000;margin-top:-58px;margin-left:-16px;">';
}
?>

</div>

  <ul id="ulinfo">
   <li  class="active" id="liinfo"> <a href="my_info.php" class="list-group-item"  >Personal Details</a> </li>
   <li  id="liinfo"> <a href="contact_details.php" class="list-group-item" >Contact Details</a> </li>
   <li id="liinfo"> <a href="emergency_contacts.php" class="list-group-item" >Emergency Contacts</a> </li>
   <li  id="liinfo"> <a href="depend.php" class="list-group-item" >Dependents</a> </li>
  
   
   <li  id="liinfo"> <a href="report_to.php" class="list-group-item" >Report-to</a> </li>
  </ul>
</div>
</div>
<div class="col-md-9">
<div class="well" id="rightwell">
<h3 class="headinginfo">
<div class="row">Emergency contacts
  <span style="float:right;"> 
  <a href="emp_dashboard.php">
  <img src="images\backarrow.png" style="width:35px;hieght:30px;margin-top:-9px;margin-right:8px;"> </a> </span>
  
  </div></h3>
</div>
<div class="well" id="rightinnerwell">
<form method="post">
<div class="row">
<div class="col-md-2">
   <label>Name </label>
  </div>
  <div class="col-md-10">
  <input disabled="disabled" style="background-color:#e3e3e3;" name="name"  id="name1" class="field_for" type="text"  pattern="^[a-zA-Z]+[\-'\s]?[a-zA-Z ]+$" title="Enter Name" value="<?php if(isset($ename_db)) { echo $ename_db; } ?>" required>
  </div>
  </div><br>
  <div class="row">
  <div class="col-md-2"> 
  <label>Relationship </label>
  </div>
  <div class="col-md-10">
  <select disabled="disabled" style="background-color:#e3e3e3;" class="field_for" class="field_for" id="relationship" type="text" name="relationship" value="<?php if(isset($erelationship_db)) { echo $erelationship_db; } ?>" required> 
  <option>Father</option>
  <option>Mother</option>
  <option>Spouse</option>
  <option>Children</option>
  </select>

  </div>
  </div>
  <br>
  
  
<div class="row">
  <div class="col-md-2">
<label>Home-Telephone </label>
  </div>
  <div class="col-md-10">
 <input disabled="disabled" style="background-color:#e3e3e3;" class="field_for" id="hometele" name="hometele" type="text" value="<?php if(isset($ehometele_db)) { echo $ehometele_db; } ?>" required>
 <br>
 
</div>
</div>
<br>
 <div class="row">
  <div class="col-md-2">
 <label>Mobile-Number </label>
  </div>
  <div class="col-md-10">
  <div id="age">
  <input disabled="disabled" style="background-color:#e3e3e3;" type="text" class="field_for" id="mobilenor" name="mobile_num"  pattern="[7-9]{1}[0-9]{9}" value="<?php if(isset($emobile_db)) { echo $emobile_db; } ?>" required>
 </div>
  </div>
  </div>
  <br>
 
  
  <div class="row">
  <div class="col-md-2">
 <label>Work-Number </label>
  </div>
  <div class="col-md-10">
 <input disabled="disabled" style="background-color:#e3e3e3;" name="work_number"  class="field_for" id="worknor" type="text" title="Enter 10 digit mobile number"  value="<?php if(isset($eworknor_db)) { echo $eworknor_db; } ?>" required>
  </div>
  </div><br><br><hr>

<button type="submit" class="btn btn-success" name="submit" id="saveAppt">Save</button>
<button type="reset" class="btn btn-default" onclick="myinfoedit()" name="edit">Edit</button>
</div>
</form>


</div>
</div>
<?php 

if(isset($_POST['submit']))
{
	$id=$_SESSION['empid'];
$name=$_POST['name'];
$relationship=$_POST['relationship'];
$hometele=$_POST['hometele'];
$mobile_num=$_POST['mobile_num'];
$work_number=$_POST['work_number'];

	//update
	$sql_update="update tekhub_contact_details set ename='$name',erelationship='$relationship',ehometele='$hometele',
	emobile='$mobile_num',eworknor='$work_number' where emp_id='$id'";
	$result_update=mysqli_query($conn,$sql_update);

	if(mysqli_affected_rows($conn)>0)
	{ 
echo "
<script> alert('values are updated successfully'); </script> ";

	}
	if(!$result_update){
die('could not enter data:'.mysqli_error());
}
	//echo $count2;
}
?>  
<?php
include('footer.php');
?> 
</body>
</html>
