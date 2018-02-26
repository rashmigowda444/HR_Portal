<?php
  include('config.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tekhub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Jura" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="index.css" rel="stylesheet">

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

<body>



<form action="#" method="post" enctype="multipart/form-data">
<input type="file" name="img[]" multiple="multiple"/>



<input type="submit" name="upload" value="upload-new">
</form>
<?php

if(isset($_POST['upload']))
{
	$id = $_SESSION['empid'];
	$filename=$_FILES['img']['name'];
	$tmpname=$_FILES['img']['tmp_name'];
	$filetype=$_FILES['img']['type'];
	for($i=0;$i<=count($tmpname)-1;$i++)
	{ 
		$name=addslashes($filename[$i]);
		$tmp=addslashes(file_get_contents($tmpname[$i]));
		
		$sql="INSERT into img(name,image)values('$name','$tmp')";
		mysqli_query($conn,$sql);
		
	}
}


$res="SELECT * from img";
$result1=mysqli_query($conn,$res);
while($row=mysqli_fetch_array($result1))
{
	echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="250" height="250">';
}


?>			


</div>
  <ul id="ulinfo">
   <li  class="active" id="liinfo"> <a href="my_info.php" class="list-group-item" style="background-color:#1B1E24;" >Personal Details</a> </li>
   <li  id="liinfo"> <a href="contact_details.php" class="list-group-item" >Contact Details</a> </li>
   <li id="liinfo"> <a href="emergency_contacts.php" class="list-group-item" >Emergency Contacts</a> </li>
   <li  id="liinfo"> <a href="depend.php" class="list-group-item" >Dependents</a> </li>
  
   
   <li  id="liinfo"> <a href="report_to.php" class="list-group-item" >Report-to</a> </li>
   
    
  </ul>

</div>
</div>



<div class="col-md-9">
<div class="well" id="rightwell">
<h3 class="headinginfo">Dependency Details</h3>
</div>

<div class="well" id="rightinnerwell">



<a href="example.php" class="btn btn-success" role="button">Add</a>



<button type="button" class="btn btn-danger">Cancel</button>

</div>

<div class="row" >
  <div class="well" id="headingwell">
  <h3 id="headingdash">Dependencies Details</h3>
  </div>

<div class="well" id="contentwell">

 <?php
 
$sql1 = "Select  dependent_name,relationship,dependent_age,dob,dependent_mob_number from tekhub_employee_dependent_details";
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
        <td>{$row['dependent_name']}</td>
        <td>{$row['relationship']}</td>
		<td>{$row['dob']}</td>
		<td>{$row['dependent_age']}</td>
		 <td>{$row['dependent_mob_number']}</td>";
	   
      echo "</tr>";

      
}
    echo "</tbody>
  </table>";


  mysqli_close($conn);
  ?>
  
</div>
</div>
</div>
</div><br><hr id="hrline">



<div id="divfoot">
<h5><a href="http://tekvity.com/">Tekvity Pvt Ltd</a> © All Rights Reserved. 2017</h5>
</div>

</body>
</html>


