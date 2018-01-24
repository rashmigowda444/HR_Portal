
<?php
//check if form is submitted
if (isset($_POST['view']))
{ $url=$_GET['url'];
//echo $url;


  
//$filename = "C:/xampp/htdocs/HR_Portal/uploads/emp_policy.pdf";
$filename =$url;
header("Content-type: application/pdf");
header("Content-type: application/pdf");

header("Content-Length: " . filesize($filename));

 

readfile($filename);


//exit;  
}
?>