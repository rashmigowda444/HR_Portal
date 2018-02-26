<?php
  include('header.php');
?>
<style>
.field_for{
  width:350px;height:35px;border-radius:5px;border:none;background-color:white;
}
</style>
<script>
function myinfoedit()
 {   
	   document.getElementById("maritall").disabled=false;
	    document.getElementById("fullname").disabled=false;
	      document.getElementById("nationality").disabled=false;
	   document.getElementById("datepicker").disabled=false;
	   document.getElementById("qualification").disabled=false;
	   document.getElementById("datepicker1").disabled=false;
	    document.getElementById("genderid1").disabled=false;
		document.getElementById("genderid2").disabled=false;emailid
		document.getElementById("emailid").disabled=false;
		document.getElementById("emailid").disabled=false;
		document.getElementById("disignation").disabled=false;
		
	   document.getElementById("fullname").style.backgroundColor = "#ffffff";
	   document.getElementById("maritall").style.backgroundColor = "#ffffff";
	   document.getElementById("nationality").style.backgroundColor = "#ffffff";
	   document.getElementById("datepicker1").style.backgroundColor = "#ffffff";
	   document.getElementById("qualification").style.backgroundColor = "#ffffff";
	      document.getElementById("emailid").style.backgroundColor = "#ffffff";
          document.getElementById("disignation").style.backgroundColor = "#ffffff";
		    document.getElementById("datepicker").style.backgroundColor = "#ffffff";
}

</script>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body class="body">
<div id="divtop">
<ul id="ultopnav">
  <li id="litoplogo"><a href="index.php"><img src="images/logo.png" alt="Tekvity" height="70" width="250" ></a></li>
  <li id="litopwelcome" class="dropdown">
  <a data-toggle="dropdown" style="text-decoration: none;">
  <?php
       if(isset($_SESSION['CurrentUser'])){
        echo 'Welcome '.'&nbsp;'.$_SESSION['CurrentUser'];
       }
  ?>
  <span class="caret"></span></button></a>
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
  <?php        echo $_SESSION['CurrentUser'];  
   $var1=$_SESSION['CurrentUser']; 
   $id=$_SESSION['empid'];
	?>
</h3>
<div class="well" id="imgwell">                    
<body>
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
{	echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img']).'" width="260" height="250" style="margin-top:-38px;margin-left:-16px;">';
}
?>
<?php	
$res_emp_details="select * from tekhub_employee_personal_details where emp_id='$id'";
$result1_emp_details=mysqli_query($conn,$res_emp_details);
while($row_2=mysqli_fetch_array($result1_emp_details))
{ $name_fb=$row_2['emp_name'];
 $qualification_from_db=$row_2['qualification'];
 $date_of_joining_from_db=$row_2['date_of_joining'];
 $designation_from_db=$row_2['designation'];
 $marry_status=$row_2['martial_status'];
 $nationality=$row_2['nationality'];
 $dob_db=$row_2['dob'];
  $dob_join=$row_2['date_of_joining'];
  $email_id_db=$row_2['email_id'];
  $gender_db=$row_2['gender'];	
}
if(!$result1_emp_details){
die('could not enter data:'.mysqli_error());
}
?>				
</div>
  <ul id="ulinfo">
   <li  class="active" id="liinfo"> <a href="my_info.php" class="list-group-item"  >Personal Details</a> </li>
   <li  id="liinfo"> <a href="contact_details.php" class="list-group-item" >Contact Details</a> </li>
   <li id="liinfo"> <a href="emergency_contacts.php" class="list-group-item" >Emergency Contacts</a> </li>
   <li  id="liinfo"> <a href="depend.php" class="list-group-item" >Dependents</a> </li>  
   <li  id="liinfo"> <a href="report_to.php" class="list-group-item">Report-to</a> </li>
  </ul>
</div>
</div>
<div class="col-md-9">
<div class="well" id="rightwell">
<h3 class="headinginfo">
<div class="row">Personal Details
  <span style="float:right;"> 
  <a href="emp_dashboard.php">
  <img src="images\backarrow.png" style="width:35px;hieght:30px;margin-top:-9px;margin-right:8px;"> </a> </span>
  
  </div></h3>
</div>
<div class="well" id="rightinnerwell">
<form method="post" >
<div class="row">
<div class="col-md-2">
<label>Full Name</label>
</div>
<div class="col-md-10">

<input  disabled="disabled" style="background-color:#e3e3e3;" type="text" name="name" id="fullname" class="field_for" value="<?php echo $name_fb;  ?>" required>
</div>
</div><br>
<div class="row">
<div class="col-md-2">
<label>Gender </label>
</div>
<div class="col-md-10">
<input disabled="disabled" type="radio" id="genderid1" name="gender" value="Male" <?php if($gender_db!="")
{  echo ($gender_db=='Male')?'checked':'' ; } ?> > Male
<input disabled="disabled"  type="radio" id="genderid2" name="gender" value="Female" <?php if($gender_db!="")
{  echo ($gender_db=='Female')?'checked':'' ; } ?>> Female
</div>
</div><br>
<div class="row">
<div class="col-md-2">
<label>Marital Status </label>
</div>
<div class="col-md-10">
<select  disabled="disabled" name="marital" style="background-color:#e3e3e3;" class="field_for" id="maritall"  value=""required>
    <option><?php
 if($marry_status!="") { echo $marry_status; }else { echo "--select--";  }	?></option>
    <option >Single</option>
    <option>Married</option>
  </select>
</div>
</div><br>
<div class="row">
<div class="col-md-2">
<label>Nationality</label>
</div>
<div class="col-md-10">
<select disabled="disabled" style="background-color:#e3e3e3;" id="nationality" name="national" class="field_for"  value=" " required>
  <option value=""><?php 
  if($nationality!="") { echo $nationality; }else { echo "--select--";  }?></option>
  <option value="afghan">Afghan</option>
  <option value="albanian">Albanian</option>
  <option value="algerian">Algerian</option>
  <option value="american">American</option>
  <option value="andorran">Andorran</option>
  <option value="angolan">Angolan</option>
  <option value="antiguans">Antiguans</option>
  <option value="argentinean">Argentinean</option>
  <option value="armenian">Armenian</option>
  <option value="australian">Australian</option>
  <option value="austrian">Austrian</option>
  <option value="azerbaijani">Azerbaijani</option>
  <option value="bahamian">Bahamian</option>
  <option value="bahraini">Bahraini</option>
  <option value="bangladeshi">Bangladeshi</option>
  <option value="barbadian">Barbadian</option>
  <option value="barbudans">Barbudans</option>
  <option value="batswana">Batswana</option>
  <option value="belarusian">Belarusian</option>
  <option value="belgian">Belgian</option>
  <option value="belizean">Belizean</option>
  <option value="beninese">Beninese</option>
  <option value="bhutanese">Bhutanese</option>
  <option value="bolivian">Bolivian</option>
  <option value="bosnian">Bosnian</option>
  <option value="brazilian">Brazilian</option>
  <option value="british">British</option>
  <option value="bruneian">Bruneian</option>
  <option value="bulgarian">Bulgarian</option>
  <option value="burkinabe">Burkinabe</option>
  <option value="burmese">Burmese</option>
  <option value="burundian">Burundian</option>
  <option value="cambodian">Cambodian</option>
  <option value="cameroonian">Cameroonian</option>
  <option value="canadian">Canadian</option>
  <option value="cape verdean">Cape Verdean</option>
  <option value="central african">Central African</option>
  <option value="chadian">Chadian</option>
  <option value="chilean">Chilean</option>
  <option value="chinese">Chinese</option>
  <option value="colombian">Colombian</option>
  <option value="comoran">Comoran</option>
  <option value="congolese">Congolese</option>
  <option value="costa rican">Costa Rican</option>
  <option value="croatian">Croatian</option>
  <option value="cuban">Cuban</option>
  <option value="cypriot">Cypriot</option>
  <option value="czech">Czech</option>
  <option value="danish">Danish</option>
  <option value="djibouti">Djibouti</option>
  <option value="dominican">Dominican</option>
  <option value="dutch">Dutch</option>
  <option value="east timorese">East Timorese</option>
  <option value="ecuadorean">Ecuadorean</option>
  <option value="egyptian">Egyptian</option>
  <option value="emirian">Emirian</option>
  <option value="equatorial guinean">Equatorial Guinean</option>
  <option value="eritrean">Eritrean</option>
  <option value="estonian">Estonian</option>
  <option value="ethiopian">Ethiopian</option>
  <option value="fijian">Fijian</option>
  <option value="filipino">Filipino</option>
  <option value="finnish">Finnish</option>
  <option value="french">French</option>
  <option value="gabonese">Gabonese</option>
  <option value="gambian">Gambian</option>
  <option value="georgian">Georgian</option>
  <option value="german">German</option>
  <option value="ghanaian">Ghanaian</option>
  <option value="greek">Greek</option>
  <option value="grenadian">Grenadian</option>
  <option value="guatemalan">Guatemalan</option>
  <option value="guinea-bissauan">Guinea-Bissauan</option>
  <option value="guinean">Guinean</option>
  <option value="guyanese">Guyanese</option>
  <option value="haitian">Haitian</option>
  <option value="herzegovinian">Herzegovinian</option>
  <option value="honduran">Honduran</option>
  <option value="hungarian">Hungarian</option>
  <option value="icelander">Icelander</option>
  <option value="indian">Indian</option>
  <option value="indonesian">Indonesian</option>
  <option value="iranian">Iranian</option>
  <option value="iraqi">Iraqi</option>
  <option value="irish">Irish</option>
  <option value="israeli">Israeli</option>
  <option value="italian">Italian</option>
  <option value="ivorian">Ivorian</option>
  <option value="jamaican">Jamaican</option>
  <option value="japanese">Japanese</option>
  <option value="jordanian">Jordanian</option>
  <option value="kazakhstani">Kazakhstani</option>
  <option value="kenyan">Kenyan</option>
  <option value="kittian and nevisian">Kittian and Nevisian</option>
  <option value="kuwaiti">Kuwaiti</option>
  <option value="kyrgyz">Kyrgyz</option>
  <option value="laotian">Laotian</option>
  <option value="latvian">Latvian</option>
  <option value="lebanese">Lebanese</option>
  <option value="liberian">Liberian</option>
  <option value="libyan">Libyan</option>
  <option value="liechtensteiner">Liechtensteiner</option>
  <option value="lithuanian">Lithuanian</option>
  <option value="luxembourger">Luxembourger</option>
  <option value="macedonian">Macedonian</option>
  <option value="malagasy">Malagasy</option>
  <option value="malawian">Malawian</option>
  <option value="malaysian">Malaysian</option>
  <option value="maldivan">Maldivan</option>
  <option value="malian">Malian</option>
  <option value="maltese">Maltese</option>
  <option value="marshallese">Marshallese</option>
  <option value="mauritanian">Mauritanian</option>
  <option value="mauritian">Mauritian</option>
  <option value="mexican">Mexican</option>
  <option value="micronesian">Micronesian</option>
  <option value="moldovan">Moldovan</option>
  <option value="monacan">Monacan</option>
  <option value="mongolian">Mongolian</option>
  <option value="moroccan">Moroccan</option>
  <option value="mosotho">Mosotho</option>
  <option value="motswana">Motswana</option>
  <option value="mozambican">Mozambican</option>
  <option value="namibian">Namibian</option>
  <option value="nauruan">Nauruan</option>
  <option value="nepalese">Nepalese</option>
  <option value="new zealander">New Zealander</option>
  <option value="ni-vanuatu">Ni-Vanuatu</option>
  <option value="nicaraguan">Nicaraguan</option>
  <option value="nigerien">Nigerien</option>
  <option value="north korean">North Korean</option>
  <option value="northern irish">Northern Irish</option>
  <option value="norwegian">Norwegian</option>
  <option value="omani">Omani</option>
  <option value="pakistani">Pakistani</option>
  <option value="palauan">Palauan</option>
  <option value="panamanian">Panamanian</option>
  <option value="papua new guinean">Papua New Guinean</option>
  <option value="paraguayan">Paraguayan</option>
  <option value="peruvian">Peruvian</option>
  <option value="polish">Polish</option>
  <option value="portuguese">Portuguese</option>
  <option value="qatari">Qatari</option>
  <option value="romanian">Romanian</option>
  <option value="russian">Russian</option>
  <option value="rwandan">Rwandan</option>
  <option value="saint lucian">Saint Lucian</option>
  <option value="salvadoran">Salvadoran</option>
  <option value="samoan">Samoan</option>
  <option value="san marinese">San Marinese</option>
  <option value="sao tomean">Sao Tomean</option>
  <option value="saudi">Saudi</option>
  <option value="scottish">Scottish</option>
  <option value="senegalese">Senegalese</option>
  <option value="serbian">Serbian</option>
  <option value="seychellois">Seychellois</option>
  <option value="sierra leonean">Sierra Leonean</option>
  <option value="singaporean">Singaporean</option>
  <option value="slovakian">Slovakian</option>
  <option value="slovenian">Slovenian</option>
  <option value="solomon islander">Solomon Islander</option>
  <option value="somali">Somali</option>
  <option value="south african">South African</option>
  <option value="south korean">South Korean</option>
  <option value="spanish">Spanish</option>
  <option value="sri lankan">Sri Lankan</option>
  <option value="sudanese">Sudanese</option>
  <option value="surinamer">Surinamer</option>
  <option value="swazi">Swazi</option>
  <option value="swedish">Swedish</option>
  <option value="swiss">Swiss</option>
  <option value="syrian">Syrian</option>
  <option value="taiwanese">Taiwanese</option>
  <option value="tajik">Tajik</option>
  <option value="tanzanian">Tanzanian</option>
  <option value="thai">Thai</option>
  <option value="togolese">Togolese</option>
  <option value="tongan">Tongan</option>
  <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
  <option value="tunisian">Tunisian</option>
  <option value="turkish">Turkish</option>
  <option value="tuvaluan">Tuvaluan</option>
  <option value="ugandan">Ugandan</option>
  <option value="ukrainian">Ukrainian</option>
  <option value="uruguayan">Uruguayan</option>
  <option value="uzbekistani">Uzbekistani</option>
  <option value="venezuelan">Venezuelan</option>
  <option value="vietnamese">Vietnamese</option>
  <option value="welsh">Welsh</option>
  <option value="yemenite">Yemenite</option>
  <option value="zambian">Zambian</option>
  <option value="zimbabwean">Zimbabwean</option>
</select>
</div>
</div><br>
<div class="row">
<div class="col-md-2">
<label>DOB </label>
</div>
<div class="col-md-10">
<input disabled="disabled" class="field_for" style="background-color:#e3e3e3;" type="text" id="datepicker" name="dob"  value="<?php 
 if($dob_db!="") { echo $dob_db; }else { echo "--select--";   } ?> " required>
</div>
</div><br>
 <script type="text/javascript">
            $(function () {
                $('#datepicker').datepicker();
            });
        </script>	
		
		<div class="row">
<div class="col-md-2">
<label>email_id</label>
</div>
<div class="col-md-10">
<input disabled="disabled"  type="mail" class="field_for" id="emailid" name="email_id" value="<?php if($email_id_db!="") { echo $email_id_db; }else {    } ?>" style="background-color:#e3e3e3;" required>
</div>
</div><br>
<div class="row">
<div class="col-md-2">
<label>qualification</label>
</div> 
<div class="col-md-10">
<input disabled="disabled" id="qualification" style="background-color:#e3e3e3;" type="text" class="field_for" name="qualification" value="<?php 
 if($qualification_from_db!=""){echo $qualification_from_db;}else {  }  ?> " required>
</div>
</div><br>
<div class="row">
<div class="col-md-2">
<label>date_of_joining</label>
</div>
<div class="col-md-10">
<input disabled="disabled" id="datepicker1" style="background-color:#e3e3e3;" type="text" class="field_for" name="date_of_joining" value="<?php if($dob_join!=""){echo $dob_join;}else {  } ?> " required>
 <script type="text/javascript">
            $(function () {
                $('#datepicker1').datepicker();
            });
        </script>
</div>
</div><br>

<div class="row">
<div class="col-md-2">
<label>designation</label>
</div>
<div class="col-md-10">
<input type="text" id="disignation" class="field_for" name="designation" style="background-color:#e3e3e3;" value="<?php echo  $designation_from_db; ?> " required>
</div>
</div><br>
<br><hr>
<button type="submit" class="btn btn-default" name="submit">Save</button>&emsp;
<button type="submit" class="btn btn-default" onclick="myinfoedit()" name="edit">Edit</button>
</div>
</div>
</div><br><br><br><br><br><br><br><hr id="hrline">
<?php
if(isset($_POST['submit']))
{ 
echo $name=$_POST['name'];
//echo $images=($_FILES['images']); 
echo $gender=$_POST['gender']; echo "&emsp;";
echo $marital=$_POST['marital'];
echo $national=$_POST['national'];
echo $dob=$_POST['dob'];
echo $email_id=$_POST['email_id'];
echo $qualification=$_POST['qualification'];
echo $date_of_joining=$_POST['date_of_joining'];
echo $designation=$_POST['designation'];
$sql1="update tekhub_employee_personal_details set emp_name='$name',gender='$gender',martial_status='$marital',nationality='$national',dob='$dob',email_id='$email_id',
qualification='$qualification',date_of_joining='$date_of_joining',designation='$designation' where emp_id='$id'";

$retval=mysqli_query($conn,$sql1);
if(!$retval){
die('could not enter data:'.mysqli_error());
}
}

 ?>
<?php
include('footer.php');
?> 

</div>
</body>
</html>