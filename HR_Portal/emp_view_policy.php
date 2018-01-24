<?php
  include('emp_header.php');
?>
<script type="text/javascript">
  document.getElementById('jsform').submit();
</script>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Live MySQL Database Search</title>
<style type="text/css">
<style>
.view input {
  border:0;
  background:0;
  outline:none !important;
}
</style>
<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

</head>
<body>
<div class="row" >
  <div class="well" id="headingwell">
  <h3 id="headingdash">Policies and procedures
  </div>

<div class="well" id="contentwell">

    <div class="row">
        
       <?php 
	   $sql="select * from tbl_files where filename='emp_policy.pdf'";

  $retval=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($retval);
	if($count>=1)
{
		
		if(!$retval)
      {
die('Could not fetch data: ' . mysqli_error($conn));
      }
   
    while($row1= mysqli_fetch_array($retval,MYSQLI_ASSOC))
	{  $file_url=$row1['target_path'];
     
	}  
		 
         }
		 echo "<form  method='post'  action='view_policy_pdf.php?url=$file_url' enctype='multipart/form-data'> "; ?>
       
            
            <div class="form-group" align="center" >
			
                <input type="submit" name="view" value="View Policy" class="btn btn-info"/>
				
            </div>
         
        </form>
		<form method="post" enctype="multipart/form-data">           
		<div class="form-group" align="center" >
		<input type="submit" name="download" value="Download Policy" class="btn btn-info"/>
		 </div>
		</form>
        
    </div>
    
   

</div>
</div>
<br><hr id="hrline">   

</body>
</html>
<?php
if(isset($_POST['download']))
{
	$sql="select * from tbl_files where filename='emp_policy.pdf'";

  $retval=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($retval);
	if($count>=1)
{		if(!$retval)
      {
die('Could not fetch data: ' . mysqli_error($conn));
      }
   
    while($row1= mysqli_fetch_array($retval,MYSQLI_ASSOC))
	{ echo $file_url=$row1['target_path'];
           $filename_from_db=$row1['filename'];
	}
 $filePath=$file_url;
if(!empty($filePath) && file_exists($filePath)){
    // Define headers
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename_from_db");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");
    // Read the file
    readfile($filePath);
    exit;
}else{echo 'The file does not exist.';}



	
}
}
?>

<?php
include('footer.php');
?>  
