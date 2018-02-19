<?php
include('emp_header.php');
?>
<script>
$(document).ready(function() {
	var a=document.getElementById("abcd");
	a.value="abgjj";
    //alert("vv");
    $(".myInput2,.myInput3,.myInput4,.myInput5,.myInput6,.myInput7,.myInput8").change(function() { 
	  var monval1=document.getElementById("myInput2").value;
	  var tueval1=document.getElementById("myInput3").value;
	  var total1=document.getElementById("myInput9");
	   var wenval1=document.getElementById("myInput4").value;
	   var thuval1=document.getElementById("myInput5").value;
   
	//alert("dd"); alert(total1); alert("ddd");
	var add=parseInt(monval1);
	var add1=parseInt(tueval1);
	var add2=parseInt(wenval1);
	var addtotal=add+add1+add2;
	total1.value=addtotal;
	
	
	
	
	});
});
	</script>
<style>
.view input {
  border:0;
  background:0;
  outline:none !important;
}
</style>
<script>
function calculateTime(){

  //Get selected data  
 // var elt = document.getElementById("myInput2");
   // var mondate = elt.value;

   // var elt = document.getElementById("myInput3");
    //var tuedate = elt.value;
  
  //mondate = parseInt(mondate);
    //tuedate = parseInt(tuedate);
  
 // var total = mondate+tuedate; 
  
  //print value to  PicExtPrice

  // Creating an array of all time field IDs
  var timeFieldIds = [
         "myInput2", "myInput3" ];<!-- "supsat1a", "supmon1a", "suptue1a", "supwed1a",-->
		 //"supthu2a", "supfri2a", "supsat2a", "supmon2a", "suptue2a", "supwed2a" ];
  
  var total = 0;

  // Looping over the array of IDs
  for(var i = 0; i < timeFieldIds.length; i++) {
        // For each ID:

        // Select the element
        var el = document.getElementById(timeFieldIds[i]);

        // Get the value of the element and parse it as a integer.
        // " || 0" will make all invalid integers into zeroes.
        var val = parseInt(el.value) || 0;

        // Increase the total value
        total += val;
  }
  
  //print value to  PicExtPrice 
  document.getElementById("myInput9").value=total;
</script>
<script>
$(function(){
    $('#groups').on('change', function(){
        var val = $(this).val();
        var sub = $('#sub_groups');
        $('option', sub).filter(function(){
            if (
                 $(this).attr('data-group') === val 
              || $(this).attr('data-group') === 'SHOW'
            ) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
    $('#groups').trigger('change');
});
</script>
<script>
function myFunction() {
    document.getElementById("Projectname").contentEditable = true;   
    document.getElementById("Projectname").style.backgroundColor = "#ffffff";

    document.getElementById("Activityname").contentEditable = true;   
    document.getElementById("Activityname").style.backgroundColor = "#ffffff";

    document.getElementById("myInput2").contentEditable = true;   
    document.getElementById("myInput2").style.backgroundColor = "#ffffff";

    document.getElementById("myInput3").contentEditable = true;   
    document.getElementById("myInput3").style.backgroundColor = "#ffffff";
   
    document.getElementById("myInput4").contentEditable = true;   
    document.getElementById("myInput4").style.backgroundColor = "#ffffff";
   
    document.getElementById("myInput5").contentEditable = true;   
    document.getElementById("myInput5").style.backgroundColor = "#ffffff";

    document.getElementById("myInput6").contentEditable = true;   
    document.getElementById("myInput6").style.backgroundColor = "#ffffff";

    document.getElementById("myInput7").contentEditable = true;   
    document.getElementById("myInput7").style.backgroundColor = "#ffffff";
    
    document.getElementById("myInput8").contentEditable = true;   
    document.getElementById("myInput8").style.backgroundColor = "#ffffff";
	
	document.getElementById("myInput9").contentEditable = true;   
    document.getElementById("myInput9").style.backgroundColor = "#ffffff";
    
}
</script>
<script>
function calculateTim()
{
	var total=mondate+tuedate;
	alert("total");
}
</script>
<form method="post">
<div class="row" >
  <div class="well" id="headingwell">
  <h3 id="headingdash">Timesheet for Week</h3>
  </div>

<div class="well" id="contentwell">


<?php
$monday = strtotime("last monday");
$mon = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
 $tuesday = strtotime(date("Y-m-d",$monday)." +1 day");
$wednesday = strtotime(date("Y-m-d",$monday)." +2 days");
$thursday = strtotime(date("Y-m-d",$monday)." +3 days");
$friday = strtotime(date("Y-m-d",$monday)." +4 days");
$saturday = strtotime(date("Y-m-d",$monday)." +5 days");
$sunday = strtotime(date("Y-m-d",$monday)." +6 days");
 
$this_week_sd = date("Y-m-d",$mon);
$mondate=date("d D",$monday);
$tuedate=date("d D",$tuesday);
$weddate=date("d D",$wednesday);
$thurdate=date("d D",$thursday);
$fridate=date("d D",$friday);
$satdate=date("d D",$saturday);
$sundate=date("d D",$sunday);
$this_week_ed = date("Y-m-d",$sunday);
echo "<table class='table table-bordered view' >
    <thead>
      <tr>
        <th>Project Name</th>
        <th>Activity Name</th>
        <th>$mondate</th>
        <th>$tuedate</th>
        <th>$weddate</th>
        <th>$thurdate</th>
        <th>$fridate</th>
        <th>$satdate</th>
        <th>$sundate</th>
		<th>total Hours</th>
      </tr>
    </thead>
    <tbody>
      <tr>";
        echo "    
        <td>
			<select  id='Projectname' name='Projectname' value='--'>";
  echo '<option value="">Select Project</option>';

$query = $conn->query("SELECT * FROM tekhub_project_details  ORDER BY Projectname ASC");
//Count total number of rows
$rowCount = $query->num_rows;
      if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['project_id'].'">'.$row['Projectname'].'</option>';
        }
    }else{
        echo '<option value="">Project not available</option>';
    }
echo "</select>";
	echo "<td> <select id='Activityname' name='Actvityname'  value='--'>";
   echo ' <option value="">Select Activity Name</option>';
	echo "
</select></td>
";
      ?>

		<td><input name="mondate" id="myInput2" class="myInput2"  type="number"  value="--" style="width:60px;" onChange="calculateTim()"/></td>
        <td><input name="tuedate" id="myInput3" class="myInput3"  type="number"  value='--' style='width:60px;' onChange="calculateTim()"/></td>
        <td><input name="" id="myInput4" class="myInput4"  type="number"   style="width:60px;"/></td>
        <td><input  name="" id="myInput5" class="myInput5"  type="text"  value="--" style="width:60px;"/></td>
        <td><input name="" id="myInput6" class="myInput6"  type="text"  value="--" style="width:60px;"/></td>
        <td><input  name="" id="myInput7" class="myInput7"  type="text"  value="--" style="width:60px;"/></td>
        <td><input name="" id="myInput8" class="myInput8"  type="text"  value="--" style="width:60px;"/></td>
		<td><input   type="text" id="myInput9"    style="width:60px;"/></td>
		
		<input type="text"   id="abcd"/>
      </tr>
    </tbody>
  </table>
<button id="btn" onclick='myFunction()'>Edit</button>
<button id="btn" type='submit'  name='save'>Save</button>
</form>
</div>

<?php

if(isset($_POST['save']))
{  
$mon_new=$_POST['mondate'];
$tuedate_new=$_POST['tuedate'];

echo $mon_new; 
 echo $tuedate_new;
 echo $mondate;
  echo   $weddate;

	$id = $_SESSION['emp_id'];
	
	$Projectname=$_POST['Projectname'];
	$Activityname=['Activityname'];
	//$mon=$_POST['mon'];
	//$Tuesday=$_POST['Tuesday'];
	//$Wednesday=$_POSTT['Wednesday'];
	//$Thursday=$_POST['Thursday'];
	//$Friday=$_POST['Friday'];
	//$Saturday=$_POST['Saturday'];
	//$Sunday=$_POST['Sunday'];
	
	$sql="INSERT INTO `timesheet_day_wise` (`emp_id`, `date`, `project_id`, `day_id`) VALUES ('$id', '$mon', '$Projectname', '$Activityname')";
	$retval=mysqli_query($conn,$sql);
	if(!$retval){
die('could not enter data:'.mysqli_error());
}

}
?>

</div>
</div><br><hr id="hrline">
<script type="text/javascript">
$(document).ready(function(){
    $('#Projectname').on('change',function(){
        var project_id = $(this).val();
        if(project_id){
            $.ajax({
                type:'POST',
                url:'ajax.php',
                data:'project_id='+project_id,
                success:function(html){
                    $('#Activityname').html(html);
                 //  $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#Activityname').html('<option value="">Select Projectname first</option>');
            //$('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#Activityname').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajax.php',
                data:'activity_id='+activity_id,
                success:function(html){
                 //   $('#city').html(html);
                }
            }); 
        }//else{
            //$('#city').html('<option value="">Select state first</option>'); 
        //}
    });
});
</script>


<?php
include('footer.php');
?>