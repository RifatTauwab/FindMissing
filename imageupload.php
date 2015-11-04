<?php

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 200000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    $image_real = $_FILES["file"]["name"];
    //echo "Upload: " . $image_real . "<br>";
    //echo "Type: " . $_FILES["file"]["type"] . "<br>";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
     // move_uploaded_file($_FILES["file"]["tmp_name"],
     // "upload/" . $_FILES["file"]["name"]);
        $file_extension = pathinfo($image_real, PATHINFO_EXTENSION);
        //$random = substr(md5(time() * rand()),0,10);
        $image = substr(sha1(mt_rand().time()), 0, 10).".".$file_extension;
        
        move_uploaded_file($_FILES["file"]["tmp_name"],
        "upload/" .$image);
     // echo "Stored in: " . "upload/" . $image;
      }
    }
  }
else
  {
  echo "Invalid file";
  }
    $id = substr(number_format(time() * rand(),0,'',''),0,10);
    echo $id;
    $name=$_POST['name'];
    $age=$_POST['age'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    //$image_url = "upload\\".$image;
     include 'db_connection.php';
  $sql="INSERT INTO missing (id, name, age, phone, image , description)
VALUES
('$id','$name',$age,'$phone','$image','$description')";
mysqli_query($con,$sql);
   //echo "<br><img src='upload/577957_410096392446303_659987678_n.jpg' alt='Smiley face' width='32' height='32'>" ; 
   //set the random id length 
//$random = substr(number_format(time() * rand(),0,'',''),0,10);
//echo $random;
//echo "<br>";
echo "<br><img src='upload/$image' width='100' height='100'><br>" ;
echo "ID = $id"."<br>";
echo "name = $name"."<br>";
echo "age = $age"."<br>";
echo "phone = $phone"."<br>";
echo "description = $description"."<br>";


?>

