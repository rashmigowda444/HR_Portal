<?php
  include('header.php');
?>
<style>
.field_for{
  width:350px;height:35px;border-radius:5px;border:none;background-color:white;
}
</style>
<script>
function show()
{ 
	document.getElementById('adddependence').style.display="";
}
function show2()
{ 
	document.getElementById('adddependence').style.display="none";
}
</script>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body class="body">
<div id="divtop">
<ul id="ultopnav">
  <li id="litoplogo"><a href="index.php"><img src="images/logo.png" alt="Tekvity" height="70" width="250"></a></li>
  <li id="litopwelcome" class="dropdown">
  <a data-toggle="dropdown" style="text-decoration: none;">
  <?php
        if(isset($_SESSION['CurrentUser'])){
        echo 'Welcome '.'&nbsp;'.$_SESSION['CurrentUser'];
		$id=$_SESSION['empid'];
       }
  ?>
  <span class="caret"></span></button></a>
   <ul class="dropdown-menu">
     <li><a href="#">Change Password</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
     </li>
</ul>
</div>
<div class="row" style="height:100%;">
<div class="col-md-3">
<div class="well" id="leftwell" >
<h3 class="headinginfo">
  <?php
        echo $_SESSION['CurrentUser'];  
		
	?>
</h3>
<div class="well" id="imgwell">
<body><form action="#" method="post" enctype="multipart/form-data">
<input type="file" name="img[]" style="position:absolute;" multiple="multiple"/></br>
<input type="submit" name="upload" value="upload" style="position:absolute;">
</form>
<?php
if(isset($_POST['upload']))
{ 		echo    $_POST['upload'];
 $id = $_SESSION['empid'];
 $filename=$_FILES['img']['name'];
 if($filename!="")
 {
	 echo " <script> alert('please select file');</script>";
 
 }	 
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
<div class="row">Dependency Details
  <span style="float:right;"> 
  <a href="emp_dashboard.php">
  <img src="images\backarrow.png" style="width:35px;hieght:30px;margin-top:-9px;margin-right:8px;"> </a> </span>
  
  </div></h3>
</div>
<div class="well" id="rightinnerwell">



<div id="adddependence"  style="display:none">
<div class="row" >
  <div class="well" id="headingwell">
  <h3 id="headingdash">Add Dependencies</h3>
  </div>

<div class="well" id="contentwell">

 
  <div class="row">
  <div class="col-md-8">
  <form method="post">
 
  <div class="row">
  <div class="col-md-2">
   <label>Name </label>
  </div>
  <div class="col-md-10"> 
  <input  name="namedep" pattern="^[a-zA-Z]+[\-'\s]?[a-zA-Z ]+$"  class="field_for" type="text"   title="Enter Name" required>
  </div>
  </div><br>
  <div class="row">
  <div class="col-md-2">
  <label>Relationship </label>
  </div>
  <div class="col-md-10">
  <select  class="field_for" type="text" name="relationship" required> 
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
<label>Date-Of-Birth </label>
  </div>
  <div class="col-md-10">
 <input  class="field_for" name="dobdep" type="date" required>
 <br>
 
</div>
</div>
<br>
 <div class="row">
  <div class="col-md-2">
 <label>Age </label>
  </div>
  <div class="col-md-10">
  <div id="age">
  <input type="text"  class="field_for" name="dependent_age"/>
 </div>
  </div>
  </div>
  <br>
  <script>
    $('#dob').datepicker({
    onSelect: function(value, ui) {
        var today = new Date(),
            dob = new Date(value),
            age = new Date(today - dob).getFullYear() - 1970;

        $('#age').text(age);
    },
    maxDate: '+0d',
    yearRange: '1950:2010',
    changeMonth: true,
    changeYear: true
});
var age = $("age").text();
$("#dependent_age").val(age);
</script>
  <div class="row">
  <div class="col-md-2">
 <label>Mobile-Number </label> 
  </div>
  <div class="col-md-10"> 
 <input name="dependent_mob_number"   pattern="[7-9]{1}[0-9]{9}" class="field_for" type="text"  title="Enter 10 digit mobile number" required>
  </div>
  </div><br><br><hr>

<button type="submit" class="btn btn-success" name="submit_inner" id="saveAppt">Save</button>
</div>
</form>

<div class="col-md-4">

<img src="images/whatDEA.jpg" class="pull-right"></img>
</div>
</div>
</div>
</div>
</div>
<button class="btn btn-default" onclick="show();">Add</button>
<button type="button" class="btn btn-danger" onclick="show2()">Cancel</button>
</div>
<div class="row" >
  <div class="well" id="headingwell">
  <h3 id="headingdash" style="width:950px;">Dependencies Details</h3>
  </div>
<div class="well" id="contentwell" style="width:850px;">

<?php
if (isset($_POST['submit_inner'])) 
{    $dep_name=$_POST['namedep'];
     $dep_relationship=$_POST['relationship'];
	 $dep_dob=$_POST['dobdep'];
	  $dep_age=$_POST['dependent_age'];
	  $dep_mobile_nor=$_POST['dependent_mob_number'];
	 	echo $id;
 $sql_for_depend="insert into  tekhub_employee_dependency(emp_id,depe_name,depe_relationship,depe_dob,depe_age,
 depe_number) values('$id','$dep_name','$dep_relationship','$dep_dob','$dep_age','$dep_mobile_nor')";
 $retval_depe_update=mysqli_query($conn,$sql_for_depend);
  if(!$retval_depe_update)
  {
die('Could not fetch data: ' . mysqli_error($conn));
  }

  }
?>
 <?php
$sql1 = "Select * from  tekhub_employee_dependency";
mysqli_select_db($conn,'tekvity');
  $retval1=mysqli_query($conn,$sql1);
  if(!$retval1)
  {
die('Could not fetch data: ' . mysqli_error($conn));
  }

    echo "<table class='table table-striped'>
    <thead>
      <tr>
        <th>Dependent-Name</th>
        <th>Relationship</th>
        <th>Date-of-birth</th>
		<th>Age</th>
		<th>Mobile-Number</th>
      </tr>
    </thead>
    <tbody>";
    while($row= mysqli_fetch_array($retval1,MYSQLI_ASSOC)){
      echo "<tr>
        <td>{$row['depe_name']}</td>
        <td>{$row['depe_relationship']}</td>
		<td>{$row['depe_dob']}</td>
		<td>{$row['depe_age']}</td>
		 <td>{$row['depe_number']}</td>";
      echo "</tr>";
}
    echo "</tbody>
  </table>";
  mysqli_close($conn);
  ?>
</div>
</div>
</div>
</div>
<br>
<br><br><br><br><br>
<br><hr id="hrline">
</br>
<?php
include('footer.php');

 ?> 

</body>
</html>


