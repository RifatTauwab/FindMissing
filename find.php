<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
      <link rel="stylesheet" href="imageflow.css" type="text/css" />
<script src="imageflow.js" type="text/javascript"></script>

    </head>
    <body>
            
      
            
    
   
<?php
echo '<style>'
. ' #reflection_1 {
	background-color: black;
        color : white;
}
#reflection_1 .scrollbar {
	border-bottom:1px solid #fff;'
        .'</style>';
include 'db_connection.php';
echo '<div id="reflection_1" class="imageflow">';

foreach (glob("upload/*.jpg") as $filename) {
    $imageName= explode("/", $filename);
 //echo $imageName[1];
     $sql = "SELECT id from missing where image='$imageName[1]'";
 // $result = mysqli_query($con,$sql);
  if($query_run=  mysqli_query($con,$sql)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          $id=$query_row['id'];
          
      }
  }
  else{
      echo mysql_error();
  }
    echo "<img src= '$filename' width='100' height='100' alt='ID=$id'/>";
}
echo '</div>';



//$pieces = explode("/", $filename);
//echo $pieces[1];
//echo $filename;
echo '<br>';
echo '<style>'
. ' #reflection {
	background-color: black;
        color : white;
}
#reflection .scrollbar {
	border-bottom:1px solid #fff;'
        .'</style>';
echo '<div id="reflection" class="imageflow">';
foreach (glob("displaced/*.jpg") as $filename_displaced) {
     $imageName_displaced= explode("/", $filename_displaced);
 //echo $imageName[1];
     $sql = "SELECT id from displaced where image='$imageName_displaced[1]'";
 // $result = mysqli_query($con,$sql);
  if($query_run=  mysqli_query($con,$sql)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          $id_displaced=$query_row['id'];
          
      }
  }
  else{
      echo mysql_error();
  }
    echo "<img src= '$filename_displaced' width='100' height='100' alt='ID=$id_displaced'/>";
}
echo '</div><br>';
echo '<form action="find.php" method="POST">
            ID:<input type="text" name="idSearch">
            <input type="submit" name="submit" value="Submit"> 
        </form> ';
if(isset($_POST['submit'])){
 $sql_missing = "SELECT * FROM missing where id='$_POST[idSearch]'";
 $sql_displaced = "SELECT * FROM displaced where id='$_POST[idSearch]'";
 // $result = mysqli_query($con,$sql);
  if($query_run=  mysqli_query($con,$sql_missing)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          $id_search=$query_row['id'];
          $name_search=$query_row['name'];
          $age_search=$query_row['age'];
          $phone_search=$query_row['phone'];
          $image_search=$query_row['image'];
          $description_search=$query_row['description'];
          echo "<img src= 'upload\\$image_search' width='100' height='100'/><br>";
          echo '<br>';
          echo 'id = '.$id_search;echo '<br>';
          echo 'name = '.$name_search;echo '<br>';
          echo 'age = '.$age_search;echo '<br>';
          echo 'phone = '.$phone_search;echo '<br>';
          echo 'deschiption = '.$description_search;
          //echo '<br><br>';
      }
  }
  if($query_run=  mysqli_query($con,$sql_displaced)){
      while($query_row=  mysqli_fetch_assoc($query_run)){
          $id_search=$query_row['id'];
          $name_search=$query_row['name'];
          $age_search=$query_row['age'];
          $phone_search=$query_row['phone'];
          $image_search=$query_row['image'];
          $description_search=$query_row['description'];
          echo "<img src= 'displaced\\$image_search' width='100' height='100'/><br>";
          echo '<br>';
          echo 'id = '.$id_search;echo '<br>';
          echo 'name = '.$name_search;echo '<br>';
          echo 'age = '.$age_search;echo '<br>';
          echo 'phone = '.$phone_search;echo '<br>';
          echo 'deschiption = '.$description_search;
          echo '<br><br>';
      }
  }
  
}
?>
        

        
         

      
</body>
</html>
