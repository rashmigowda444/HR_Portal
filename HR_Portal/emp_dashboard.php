<?php
  include('emp_header.php');
?>


<div class="row" id="rowdash">
<h1 id="h1head">Welcome To Employee Portal</h1>
<h4 id="h4head">Here is a glimpse of the features available on the portal:</h4><br><br>


 
 <?php
$emp_name=$_SESSION['CurrentUser'];

$emp_id=$_SESSION['empid'];


        $sql2="SELECT * from tekhub_apply_leave as a inner JOIN tekhub_employee_personal_details as b on a.emp_id=b.emp_id INNER JOIN tekhub_leaves as c on a.leave_id=c.leave_id WHERE a.leave_status_id=2 and a.emp_id='$emp_id'";
        $result=mysqli_query($conn, $sql2);
        $count1=mysqli_num_rows($result);
      ?>
      <div class="notification" style="position:absolute;background-color:white;right:140px; margin-top:-115px;">
          <span id="notification-count"><?php  if($count1>0) { echo $count1; } ?></span><img src="images/notification.png" data-toggle="modal" data-target="#myModal" width="50px" />
      </div>    
    </h4><br><br>
  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="left:500px; width:300px;">
      <div class="modal-content">
        <div class="modal-header" style="background-color:beige;"></br> 
          <?php
            echo "<h3  style='background-color:brown; height:35px;color:white;'> Applied Leaves</h3><br>";
            $sql="SELECT * from tekhub_apply_leave as a inner JOIN tekhub_employee_personal_details as b on a.emp_id=b.emp_id INNER JOIN tekhub_leaves as c on a.leave_id=c.leave_id
inner join tekhub_leave_status as d on a.leave_status_id=d.leave_status_id
			WHERE a.leave_status_id=2 or a.leave_status_id=3  and a.emp_id='$emp_id'";
            $result=mysqli_query($conn, $sql);
            $response='';
            $count=0;
          if($count1==0)
		  {
			  echo "No Notification..";
		  }
	  else
	  {
		  while($row=mysqli_fetch_array($result)) {
              $count=$count+1;  
            echo "".$count.".&nbsp;Hi &nbsp;".$row['emp_name']."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yours ".$row['leave_type']." ".$row['leave_status_name']."<hr id='hrline'>  </a>"; 
            }
	  }
          ?>   
        </div>
        <div class="modal-footer" style="background-color:beige;">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
   
  

















<div class="col-md-6" id="colleftcont">
  <div class="row">
  <div class="col-md-2">
    <img src="images/empsearch.png" alt="Tekvity" id="dashimg">
  </div>
  <div class="col-md-10">
    <h3>Employee Directory</h3>
    <p>Find out coordinates of your colleagues….all compiled in an online directory.</p>
    <a id="a-btn" href="my_info.php"><button type="button" class="btn">Personal Details</button></a>
    <a id="a-btn" href="contact_details.php"><button type="button" class="btn">Contact Details</button></a>
    <a id="a-btn" href="emergency_contacts.php"><button type="button" class="btn">Emergency Contacts</button></a>
  </div>
  </div><hr>


 <div class="row">
  <div class="col-md-2">
    <img src="images/timesheet.png" alt="Tekvity" id="dashimg">
  </div>
  <div class="col-md-10">
    <h3>Timesheet Management</h3>
    <p>Manage your weekly timesheets and Keep track of the same </p><br>
  </div>
  </div><hr>


<div class="row">
  <div class="col-md-2">
    <img src="images/performance.png" alt="Tekvity" id="dashimg">
  </div>
  <div class="col-md-10">
    <h3>Performance Management</h3>
    <p>Keep a track of your performance assessment online through a comprehensive Performance Management module.</p>
  </div>
  </div><hr>
  
  <div class="row">
  <div class="col-md-2">
    <img src="images/jobsearch1.png" alt="Tekvity" id="dashimg">
  </div>
  <div class="col-md-10">
    <h3>  Job Referrals</h3>
    <p>Keep an eye on the vacancies available within the Company and refer your friends for the same.</p>
  </div>
  </div>


  
</div>



<div class="col-md-6" id="colrightcont">

<div class="row">
  <div class="col-md-2">
    <img src="images/leave.png" alt="Tekvity" id="dashimg">
  </div>
  <div class="col-md-10">
    <h3>Leave Management</h3>
    <p>Manage your leaves and keep a track of the same.</p><br>

    <a id="a-btn" href="emp_apply_leave.php"><button type="button" class="btn">Apply</button></a>
    <a id="a-btn" href="emp_fetch_leaves.php"><button type="button" class="btn">My Leaves</button></a>
    <a id="a-btn" href="emp_entitlements.php"><button type="button" class="btn">My Entitlements & Usage Report</button></a>
  </div>
  </div><hr>


<div class="row">
  <div class="col-md-2">
    <img src="images/payslip.png" alt="Tekvity" id="dashimg">
  </div>
  <div class="col-md-10">
    <h3>Pay Slip</h3>
    <p>Generate and download your pay slips</p>
    <a id="a-btn" href="emp_select_payslip.php"><button type="button" class="btn">Generate PaySlip</button></a>
    
  </div>
  </div><hr>

 <div class="row">
  <div class="col-md-2">
    <img src="images/exit.png" alt="Tekvity" id="dashimg">
  </div>
  <div class="col-md-10">
    <h3>Exit Management</h3>
    <p>Decided to leave for good? We will ensure you have a smooth exit. Just one request….Stay in touch!</p>
  </div>
  </div>
 
 <div class="row">
   <div class="col-md-2"> <img src="images/policy.png" alt="Tekvity" id="dashimg"></div>
   <div class="col-md-10">
    <h3> Policies & Procedures</h3>
    <p>HR Policies & Procedures or Forms & Formats, all the information you often require is made available round 
   the clock!</p>
    <a id="a-btn" href="emp_view_policy.php"><button type="button" class="btn">Policy & procedure</button></a>
  
  </div> </div>
  

  <hr>

</div>
</div><br><br><hr id="hrline">


<?php
include('footer.php');
?>

</body>
</html>


