<?php
  include('header_admin.php');
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
  <input name="id"  id="field" type="text" >
  </div>
  </div><br>

  <div class="row">
  <div class="col-md-3">
  <label>Employee Name :</label>
  </div>
  <div class="col-md-9">
  <input name="name"  id="field" type="text">
  </div>
  </div><br>

  <div class="row">
  <div class="col-md-3">
  <label>Employee Password :</label>
  </div>
  <div class="col-md-9">
  <input name="password"  id="field" type="password">
  </div>
  </div><br>

  <div class="row">
  <div class="col-md-3">
  <label>Employee Email :</label>
  </div>
  <div class="col-md-9">
  <input name="email"  id="field" type="text">
  </div>
  </div><br>

<div class="row">
  <div class="col-md-3">
  <label>Employee Holidays:</label>
  </div>
  <?php 
  $sql="select * from tekhub_holiday_type";
  $retval=mysqli_query($conn,$sql);
  if(!$retval){
  die('could not enter data:'.mysqli_error());
  }
  echo"<div class='col-md-9'>
 <select  id='field' name='holiday' required>
    <option >-----Select----</option>";
  while($row= mysqli_fetch_array($retval)){
  $holiday_id=$row['holiday_list_id'];
  $holiday_name=$row['holiday_name'];
 echo" <option value=".$holiday_id.">". $holiday_name . "</option>";
  }
    echo" </select>
  </div>";
  ?>
  </div><br><br><hr>

  <button type="submit" class="btn">Add</button>
  </form>
  </div>
</div>

<?php
if(isset($_POST['id'])){
$id=$_POST['id'];
$name=$_POST['name'];
$pass=$_POST['password'];
$email=$_POST['email'];
$holiday=$_POST['holiday'];
$password= md5($pass);
$sql="INSERT INTO tekhub_add_employee(emp_id,emp_name,emp_pass,emp_email,emp_holiday_id) VALUES('$id','$name','$password','$email','$holiday')";
$retval=mysqli_query($conn,$sql);
if(!$retval){
die('could not enter data:'.mysqli_error($conn));
}


$leave="select * from tekhub_leaves";
$leave_out=mysqli_query($conn,$leave);
while($row= mysqli_fetch_array($leave_out)){
  $leave_balance=$row['leave_entitlements']; 
  $leave_id=$row['leave_id'];
  $user_leave="INSERT INTO tekhub_user_leave(emp_id,leave_id,leave_balance)VALUES('$id','$leave_id','$leave_balance')";
  $leave_insert=mysqli_query($conn,$user_leave);
  if(!$leave_insert){
  die('could not enter data in leave:'.mysqli_error($conn));
}
  }
  echo '<script language="javascript"> alert("Added successfully")</script>';
  }
?>


<div class="row" >
  <div class="well" id="headingwell">
  <h3 id="headingdash">Employee Details</h3>
  </div>

  <div class="well" id="contentwell">

  <?php
  $sql1 = "Select * from tekhub_add_employee order by emp_id asc";
  $retval1=mysqli_query($conn,$sql1);
  if(!$retval1)
  {
  die('Could not fetch data: ' . mysqli_error($conn));
  }

    echo "<table class='table table-striped'>
    <thead>
      <tr>
        <th>Employee Id</th>
        <th>Employee Name</th>
        <th>Employee Email</th>
      </tr>
    </thead>
    <tbody>";
    while($row= mysqli_fetch_array($retval1,MYSQLI_ASSOC)){
      echo "<tr>
        <td>{$row['emp_id']}</td>
        <td>{$row['emp_name']}</td>
        <td>{$row['emp_email']}</td>";
       
      echo "</tr>";      
    }
    echo "</tbody>
  </table>";


  mysqli_close($conn);
  ?>
  
 </div>
</div><br><hr id="hrline">


<?php
  include('footer.php');
?>

