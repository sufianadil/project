
<?php

$servername = 'mycourseworkscaleable.azurewebsites.net';
$username = 'sufi';
$password = 'lovE@1234';
$dbname = 'classpro';
$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
die("connection failed" . mysqli_connect_error());
}
else{ 
echo "";
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Connection</title>
</head>

<body>
</body>
</html>
