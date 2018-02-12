<?php
  include('header_admin.php');
?><?php
include('config.php');


?>
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
        <form  method="post" enctype="multipart/form-data">
         <span>         <legend>&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;Select File to Upload:</legend></span>
            <div class="form-group" align="center">
              &emsp;&emsp;&emsp;   <input type="file" name="file1" />
            </div>
            <div class="form-group" align="center" >
			 
                <input type="submit" name="submit" value="Upload" class="btn btn-info"/>&emsp;
				<a href="admin_dashboard.php"><input type="button"  class="btn btn-info" value="Back"></input></a>
            </div>
           
        </form>
        
    </div>
    
   

</div>
</div>
<br><hr id="hrline">   

</body>
</html>

<?php
//check if form is submitted
if (isset($_POST['submit']))
{  $filename = $_FILES['file1']['name'];
//echo "name:".$filename."";
  //upload file
    if($filename != '')
    {  
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx'];
            //check if file type is valid
        if (in_array($ext, $allowed))
        {  
            // get last record id
            $sql = 'select max(id) as id from tekhub_upload_files';
            $result = mysqli_query($conn, $sql);
            if (count($result) > 0)
            { 
                $row = mysqli_fetch_array($result);
                //?$filename = ($row['id']+1) . '-' . $filename;
				 $id_last=($row['id']+1);
           
		   }
            else 
                //echo   $filename = '1' . '-' . $filename;
            //set target directory
			///chmod('./uploads/',0777);
            //$path = "./uploads/";   
			chmod('C:/xampp/htdocs/123/uploads/',0777);
			 $path = 'C:/xampp/htdocs/123/uploads/';
             $file_url=$path.$filename;
            $created = @date('Y-m-d H:i:s');
           // move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
			move_uploaded_file($_FILES['file1']['tmp_name'], "$path/$filename");
            
            // insert file details into databasetarget_path
        $sql = "INSERT INTO tekhub_upload_files(filename, created,target_path) VALUES('$filename', '$created','$file_url')";
           $returnval=mysqli_query($conn, $sql);
		   if($returnval==1){
		   echo "<script> alert('file uploaded successfully'); </script>"; }
		   else{ echo "<script> alert('error'); </script>";  }
			
        }
        else
        {
           // header("Location: index.php?st=error");
			echo "<script> alert('please upload only pdf and documents'); </script>";
        }
    }
    else
        header("Location: index.php");
}
?>

<?php
include('footer.php');
?>  
