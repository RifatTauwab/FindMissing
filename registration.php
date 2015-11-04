<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
      <link rel="stylesheet" href="style.css">

    </head>
    <body>
         
 <form action="imageupload.php" method="POST" enctype="multipart/form-data">
            name:<input type="text" name="name"><br><br>
            age :<input type="text" name="age"><br><br>
            phone no : <input type="text" name="phone"><br><br>
            Description: <br>
            <textarea rows="4" cols="50" name="description">
            </textarea><br><br>
	  Photo: <input type="file" name="file" id ="file" size="25" />
        <input type="submit" name="submit" value="Submit">
            
        </form>  
      
</body>
</html>
