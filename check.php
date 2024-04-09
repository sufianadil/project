<?php
include "connection.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>

<body>

<?php

if(isset($_REQUEST['type']) == "subcat" ){
	
	echo $sql = "SELECT * FROM subcategory where cat_id=".$_REQUEST["cat_id"];
	$result = mysqli_query($conn,$sql);
	$str="";
	if(mysqli_num_rows($result)>0){
	while($row2=mysqli_fetch_assoc($result)){
	?>
	$str .=<option value="<?php echo $row2['sub_cat_id']; ?>"><?php echo $row2['sub_cat_name']; ?></option>

<?php
}
}
}
else if(isset($_REQUEST['type']) == ""){

	echo $sql = "SELECT * FROM category";
	$result = mysqli_query($conn,$sql);
	$str ="";
	if(mysqli_num_rows($result)>0){
while($row1=mysqli_fetch_assoc($result)){
?>
 $str .=<option value="<?php echo $row1['cat_id']; ?>"><?php echo $row1['cat_name']; ?></option>
<?php
}
}
}
echo $str;
?>


</body>
</html>

