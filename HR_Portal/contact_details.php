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
	   document.getElementById("addresstreat1").disabled=false;
	   document.getElementById("addresstreat1").style.backgroundColor = "#ffffff";
	   
	   document.getElementById("addresstreat2").disabled=false;
	   document.getElementById("addresstreat2").style.backgroundColor = "#ffffff";
		  
	      document.getElementById("city").disabled=false;
		  document.getElementById("city").style.backgroundColor = "#ffffff";
		  
	   document.getElementById("state").disabled=false;
	     document.getElementById("state").style.backgroundColor = "#ffffff";
		 
	   document.getElementById("zipcode").disabled=false;
	   document.getElementById("zipcode").style.backgroundColor = "#ffffff";
	   
	   document.getElementById("country").disabled=false;
	   document.getElementById("country").style.backgroundColor = "#ffffff";
	   
	    document.getElementById("hometel").disabled=false;
		document.getElementById("hometel").style.backgroundColor = "#ffffff";
		
		document.getElementById("mobile_no").disabled=false;
		 document.getElementById("mobile_no").style.backgroundColor = "#ffffff";
		 
	   document.getElementById("worktel").disabled=false;
	   document.getElementById("worktel").style.backgroundColor = "#ffffff";
	   
		document.getElementById("otheremail").disabled=false;
	   document.getElementById("otheremail").style.backgroundColor = "#ffffff";
	 
	 document.getElementById("workemail").disabled=false;workemail
	 document.getElementById("workemail").style.backgroundColor = "#ffffff";
		
}
</script>
<?php
$id = $_SESSION['empid'];
$sql_select_from_db="select * from tekhub_contact_details where emp_id='$id' ";
$retval_from_db=mysqli_query($conn,$sql_select_from_db);
while($row_db=mysqli_fetch_array($retval_from_db))
{
  $address1=$row_db['address1']; 
  $address2=$row_db['address2'];
 $city= $row_db['city'];
  $state=$row_db['state'];
  $zip=$row_db['zip'];
  $country=$row_db['country'];
  $hometel=$row_db['hometele'];
  $mobile_nor=$row_db['mobile'];
  $worktele=$row_db['worktele'];
   $workmail=$row_db['workemail'];
   $othermail=$row_db['otheremail'];
 
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
  ?><span class="caret"></span></button></a>

    <ul class="dropdown-menu">
     <li><a href="#">Change Password</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
     </li>
</ul>
</div><hr id="hrline"><br>
<?php      $_SESSION['CurrentUser'];  
   $var1=$_SESSION['CurrentUser']; 
   $id=$_SESSION['empid'];
	?>
<div class="row" style="height:100%;">
<div class="col-md-3">
<div class="well" id="leftwell" >
<h3 class="headinginfo">
  <?php
        echo $_SESSION['CurrentUser'];      
	?>
</h3>
<div class="well" id="imgwell">
<form action="#" method="post" enctype="multipart/form-data">
<input type="file" name="img[]" style="position:absolute;" multiple="multiple"/></br>
<input type="submit" name="upload" value="upload" style="position:absolute;">
</form>
<?php
if(isset($_POST['upload']))
{   echo    $_POST['upload'];
 
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
		 		
	}
}
$res="select * from tekhub_employee_personal_details where emp_id='$id'";
$result1=mysqli_query($conn,$res);
while($row=mysqli_fetch_array($result1))
{	echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img']).'" width="260" height="250" style="margin-top:-38px;margin-left:-16px;">';
}
?>
</div>
  <ul id="ulinfo">
   <li  id="liinfo"> <a href="my_info.php" class="list-group-item"  >Personal Details</a> </li>
   <li class="active"  id="liinfo"> <a href="contact_details.php" class="list-group-item">Contact Details</a> </li>
   <li id="liinfo"> <a href="emergency_contacts.php" class="list-group-item" >Emergency Contacts</a> </li>
   <li  id="liinfo"> <a href="dependent.php" class="list-group-item" >Dependents</a> </li>
  
   <li  id="liinfo"> <a href="report_to.php" class="list-group-item" >Report-to</a> </li>  
  </ul>
</div>
</div>
<div class="col-md-9">
<div class="well" id="rightwell">
<h3 class="headinginfo">
<div class="row">Contact Details
  <span style="float:right;"> 
  <a href="emp_dashboard.php">
  <img src="images\backarrow.png" style="width:35px;hieght:30px;margin-top:-9px;margin-right:8px;"> </a> </span>
  </div>
</h3>
</div>
<div class="well" id="rightinnerwell">
<form method="post">
<div class="row">
<div class="col-md-3">
<label>Address Street 1</label>
</div>
<div class="col-md-9">
<input disabled="disabled" style="background-color:#e3e3e3;" type="text" id="addresstreat1" class="field_for" value="<?php if(isset( $address1)){ echo  $address1;  }  ?>" name="address1">
</div>
</div><br>

<div class="row">
<div class="col-md-3">
<label>Address street 2</label>
</div>
<div class="col-md-9">
<input   disabled="disabled"  style="background-color:#e3e3e3;"  type="text" class="field_for" id="addresstreat2" value="<?php if(isset( $address2)){ echo  $address2;  } ?>" name="address2">
</div>
</div><br>
<div class="row">
<div class="col-md-3">
<label>City </label>
</div>
<div class="col-md-9">
<input disabled="disabled"  style="background-color:#e3e3e3;" type="text" class="field_for" id="city" value="<?php if(isset($city)){ echo   $city;  }  ?>" name="city">
</div>
</div><br>
<div class="row">
<div class="col-md-3">
<label>State/Province </label>
</div>
<div class="col-md-9">
<input disabled="disabled" style="background-color:#e3e3e3;" type="text" id="state" class="field_for" value="<?php if(isset($state)){ echo   $state;  } ?>" name="state">
</div>
</div><br>
<div class="row">
<div class="col-md-3">
<label>Zip Code </label>
</div>
<div class="col-md-9">
<input disabled="disabled" pattern="[1-9]{1}[0-9]{6}"  style="background-color:#e3e3e3;" id="zipcode" name="zip" class="field_for" value="<?php if(isset($zip)){ echo   $zip;  } ?>" type="text" required >
</div>
</div><br>
<div class="row">
<div class="col-md-3">
<label>Country</label>
</div>
<div class="col-md-9">
<select disabled="disabled" style="background-color:#e3e3e3;" name="country" id="country" class="field_for" value="<?php if(isset($country)){ echo   $country;  } ?>">
  <option>--Select--</option>
    <option value="Afghanistan">Afghanistan</option>
    <option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antartica">Antarctica</option>
    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="Argentina">Argentina</option>
    <option value="Armenia">Armenia</option>
    <option value="Aruba">Aruba</option>
    <option value="Australia">Australia</option>
    <option value="Austria">Austria</option>
    <option value="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas">Bahamas</option>
    <option value="Bahrain">Bahrain</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbados">Barbados</option>
    <option value="Belarus">Belarus</option>
    <option value="Belgium">Belgium</option>
    <option value="Belize">Belize</option>
    <option value="Benin">Benin</option>
    <option value="Bermuda">Bermuda</option>
    <option value="Bhutan">Bhutan</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
    <option value="Botswana">Botswana</option>
    <option value="Bouvet Island">Bouvet Island</option>
    <option value="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei Darussalam">Brunei Darussalam</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Canada">Canada</option>
    <option value="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="Christmas Island">Christmas Island</option>
    <option value="Cocos Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo">Congo</option>
    <option value="Congo">Congo, the Democratic Republic of the</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cota D'Ivoire">Cote dIvoire</option>
    <option value="Croatia">Croatia (Hrvatska)</option>
    <option value="Cuba">Cuba</option>
    <option value="Cyprus">Cyprus</option>
    <option value="Czech Republic">Czech Republic</option>
    <option value="Denmark">Denmark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominica">Dominica</option>
    <option value="Dominican Republic">Dominican Republic</option>
    <option value="East Timor">East Timor</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Egypt">Egypt</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea">Eritrea</option>
    <option value="Estonia">Estonia</option>
    <option value="Ethiopia">Ethiopia</option>
    <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="France Metropolitan">France, Metropolitan</option>
    <option value="French Guiana">French Guiana</option>
    <option value="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories">French Southern Territories</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambia">Gambia</option>
    <option value="Georgia">Georgia</option>
    <option value="Germany">Germany</option>
    <option value="Ghana">Ghana</option>
    <option value="Gibraltar">Gibraltar</option>
    <option value="Greece">Greece</option>
    <option value="Greenland">Greenland</option>
    <option value="Grenada">Grenada</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Guam">Guam</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guinea">Guinea</option>
    <option value="Guinea-Bissau">Guinea-Bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
    <option value="Holy See">Holy See (Vatican City State)</option>
    <option value="Honduras">Honduras</option>
    <option value="Hong Kong">Hong Kong</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India">India</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Iran">Iran (Islamic Republic of)</option>
    <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Democratic People's Republic of Korea">Korea, Democratic Peoples Republic of</option>
    <option value="Korea">Korea, Republic of</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao">Lao Peoples Democratic Republic</option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon" selected>Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macau">Macau</option>
    <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia">Micronesia, Federated States of</option>
    <option value="Moldova">Moldova, Republic of</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar">Myanmar</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles">Netherlands Antilles</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Island">Norfolk Island</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn">Pitcairn</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Qatar">Qatar</option>
    <option value="Reunion">Reunion</option>
    <option value="Romania">Romania</option>
    <option value="Russia">Russian Federation</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
    <option value="Saint LUCIA">Saint LUCIA</option>
    <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Slovakia">Slovakia (Slovak Republic)</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
    <option value="Span">Spain</option>
    <option value="SriLanka">Sri Lanka</option>
    <option value="St. Helena">St. Helena</option>
    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
    <option value="Swaziland">Swaziland</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syria">Syrian Arab Republic</option>
    <option value="Taiwan">Taiwan, Province of China</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania">Tanzania, United Republic of</option>
    <option value="Thailand">Thailand</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos">Turks and Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States">United States</option>
    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Vietnam">Viet Nam</option>
    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
    <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
    <option value="Western Sahara">Western Sahara</option>
    <option value="Yemen">Yemen</option>
    <option value="Yugoslavia">Yugoslavia</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>
</select>
</div>
</div><hr>
<div class="row">
<div class="col-md-3">
<label>Home Telephone </label>
</div>
<div class="col-md-9">
<input disabled="disabled" style="background-color:#e3e3e3;" class="field_for" type="text" name="hometele" id="hometel" value="<?php if(isset($hometel)){ echo   $hometel;  } ?>">
</div>
</div><br>
<div class="row">
<div class="col-md-3">
<label>Mobile </label>
</div>
<div class="col-md-9">
<input  disabled="disabled" style="background-color:#e3e3e3;" type="text"   name="mobile" class="field_for" id="mobile_no" value="<?php if(isset($mobile_nor)){ echo   $mobile_nor;  }  ?>" pattern="[1-9]{1}[0-9]{9}">
</div>
</div><br>
<div class="row">
<div class="col-md-3">
<label>Work Telephone </label>
</div>
<div class="col-md-9">
<input disabled="disabled" style="background-color:#e3e3e3;" type="int" name="worktele" class="field_for" id="worktel" value="<?php if(isset($worktele)){ echo   $worktele;  } ?>">
</div>
</div><hr>
<div class="row">
<div class="col-md-3">
<label>Work Email </label>
</div>
<div class="col-md-9">
<input disabled="disabled" type="mail" name="workemail" id="workemail" style="background-color:#e3e3e3;" class="field_for" value="<?php if(isset($workmail)){ echo   $workmail;  } ?>">
</div>
</div><br>
<div class="row">
<div class="col-md-3">
<label>Other Email</label>
</div>
<div class="col-md-9">
<input disabled="disabled" type="mail" style="background-color:#e3e3e3;" name="otheremail" class="field_for" id="otheremail" value="<?php if(isset($othermail)){ echo   $othermail;  } ?>"  pattern="[^ @]*@[^ @]*">
</div>
</div><br><hr>
<button type="submit" class="btn btn-success" name="submit">Save</button>
<button type="button" class="btn btn-default" onclick="myinfoedit()" name="edit">Edit</button>
</div>
</div>
</form>
</div><br><br><br><br><br><br><br><hr id="hrline">
<?php
if(isset($_POST['submit'])){
 $address1=$_POST['address1'];
 $address2=$_POST['address2'];
 $city=$_POST['city'];
 $state=$_POST['state'];
 $zip=$_POST['zip'];
 $country=$_POST['country'];
 $hometele=$_POST['hometele'];
 $mobile=$_POST['mobile'];
 $worktele=$_POST['worktele'];
 $workemail=$_POST['workemail'];
 $otheremail	=$_POST['otheremail'];
$sql_for_select="select * from tekhub_contact_details where emp_id='$id' ";
$retval_for_select=mysqli_query($conn,$sql_for_select);
$count_id=mysqli_num_rows($retval_for_select);
if($count_id>0)
{
	//update
	$sql_update="update tekhub_contact_details set address1='$address1',address2='$address2',city='$city',
	state='$state',zip='$zip',country='$country',hometele='$hometele',mobile='$mobile',worktele='$worktele',workemail='$workemail',otheremail='$otheremail' where emp_id='$id'";
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
else
{	
$sql1="INSERT INTO tekhub_contact_details (`emp_id`,`address1`, `address2`, `city`, `state`, `zip`, `country`, `hometele`, `mobile`, `worktele`, `workemail`, `otheremail`)
 VALUES ('$id','$address1', '$address2', '$city', '$state', '$zip', '$country', '$hometele', '$mobile', '$worktele', '$workemail', '$otheremail')";

$retval=mysqli_query($conn,$sql1);
if($retval)
{echo '<script language="javascript"> alert("Added successfully")
</script>';
}else{echo '<script language="javascript"> alert("not added successfully")
</script>'; }
if(!$retval){
die('could not enter data:'.mysqli_error());
}
}
}
?>

<?php /*
       mysqli_select_db($conn,'tekvity');
	   
	   if(isset($_POST['edit']))
{
 $name=$_POST['name'];
 
        $sql = "SELECT * FROM tekhub_personal_details WHERE name='$name'";
		$result = mysqli_query($conn,$sql);
}
if(!$sql)
{
	echo "no records";
}
         while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
 $name=$row['name'];
		 $gender=$row['gender'];
		 $marital=$row['marital'];
		 $national=$row['national'];
		  $dob=$row['dob'];
		 $email_id = $row['email_id'];
       $qualification=$_POST['qualification'];
	   $date_of_joining=$_POST['date_of_joining']; 
             }  */
     ?>    
<?php
include('footer.php');
?> 


</body>
</html>
