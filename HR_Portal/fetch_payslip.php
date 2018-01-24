<?php
  include('config.php');
  session_start();
     if(isset($_SESSION["CurrentUser"]) && $_SESSION["admin"] == "0")
{

}else{
echo '<script>window.location="employee_login.php";</script>';

}

$sql="Select basic_salary,income_tax,emp_id from tekhub_employee_salary ";
$retval=mysqli_query($conn,$sql);
  if(!$retval)
  {
die('could not retreive data:'.mysqli_error($conn));
  }

    while($row= mysqli_fetch_array($retval)){
    $id=$row['emp_id'];
    $basic=$row['basic_salary'];
    $income=$row['income_tax'];
    
   

$sql1= " Select conveyance,house_rent,medical,special,professional_tax from tekhub_employee_allowances";
  $retval1=mysqli_query($conn,$sql1);
  if(!$retval1)
  {
die('could not retreive data:'.mysqli_error($conn));
  }

    while($row1= mysqli_fetch_array($retval1)){
    $conveyance=($row1['conveyance'] * $basic) / 100;
    $house=($row1['house_rent'] * $basic) / 100;
    $medical=($row1['medical'] * $basic) / 100;
    $special=($row1['special'] * $basic) / 100;
    $professional=$row1['professional_tax'];
    }
    

   $gross= "";
    $net="";
    $gross=$basic + $conveyance + $house + $medical + $special;
    $net=$gross-$professional-$income;
    
   
   
  

    
$sql3="Insert into tekhub_employee_payment_details(emp_id,basic_salary,conveyance,house_rent,medical,special,professional_tax,gross_earnings,net_pay,income_tax) values('$id','$basic','$conveyance','$house','$medical','$special','$professional','$gross','$net','$income')";
   $retval3=mysqli_query($conn,$sql3);
  if(!$retval3)
  {
die('could not enter data:'.mysqli_error($conn));
  }
  }
?>




