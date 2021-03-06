<?php
include('emp_header.php');
?>

<style>
.view input {
  border:0;
  background:0;
  outline:none !important;
}
</style>

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
    document.getElementById("myInput").contentEditable = true;   
    document.getElementById("myInput").style.backgroundColor = "#ffffff";

    document.getElementById("myInput1").contentEditable = true;   
    document.getElementById("myInput1").style.backgroundColor = "#ffffff";

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
    
}
</script>

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
      </tr>
    </thead>
    <tbody>
      <tr>";
        echo "
    
        <td>
		
		<select  id='Projectname' name='Projectname'>";
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
	
	
	echo "<td> <select id='Activityname' name='Actvityname'>";
   echo ' <option value="">Select Activity Name</option>';
	echo "
</select></td>
";
       echo "

		<td><input id='myInput2'  type='text'  value='--' style='width:60px;'/></td>
        <td><input id='myInput3'  type='text'  value='--' style='width:60px;'/></td>
        <td><input id='myInput4'  type='text'  value='--' style='width:60px;'/></td>
        <td><input id='myInput5'  type='text'  value='--' style='width:60px;'/></td>
        <td><input id='myInput6'  type='text'  value='--' style='width:60px;'/></td>
        <td><input id='myInput7'  type='text'  value='--' style='width:60px;'/></td>
        <td><input id='myInput8'  type='text'  value='--' style='width:60px;'></td>
      </tr>
    </tbody>
  </table>

<button id='btn' onclick='myFunction()'>Edit</button>
<button id='btn' onclick='myFunction()'>Save</button>";


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
            $('#Activityname').html('<option value="">Select country first</option>');
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