<?php
ob_start();
include "connection.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Code Of PopUp</title>
</head>
<body>


<?php
$action = "add";
if(isset($_REQUEST["action"]))
$action =$_REQUEST["action"];

if($_POST){

$catid = $_POST["cat_id"];
$subcatid = $_POST["sub_cat_id"];
$productname = $_POST["product_name"];
$productdescription = $_POST["product_description"];
$productprice = $_POST["product_price"];
$date = $_POST["date"];
$location = $_POST["location"];
//$status = $_POST["status"];
//$productimage = $_FILES['file']['name'];

//if(isset($_POST["status"]))
//$status=1;
//else $status=0;

}	
?>
<?php /*
if($action == "add"){
$productname = addslashes($productname);
echo $sql = "INSERT INTO product (cat_id , sub_cat_id , product_name , product_description , product_price , date , location , status , product_image) VALUES('$catid' , '$subcatid' , '$productname' , '$productdescription' , '$productprice' , '$date' , '$location' , '$status' , '$productimage')";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

if($result){
header("location: dashboard.php?msg=Data Added Succesfully");
}
else{
echo "Not Inserted";
} 


if(isset($_POST["submit"])){
if(move_uploaded_file($_FILES['file']['tmp_name'] , "C:\xampp\htdocs\classpro\product-image\\".$_FILES['file']['name'])){
echo "";
}
else{
echo "Not Uploaded";
}
}
}
if($action == "update"){

$sql = "UPDATE product set product_name='".$productname."' ,product_category='".$productcategory."' ,product_description='".$productdescription."' ,product_image='".$productimage."' ,product_price='".$productprice."' ,stock='".$productstock."' ,status='".$productstatus."' WHERE product_id=".$_REQUEST["proid"];

$data = mysqli_query($conn,$sql);



if(isset($_POST["submit"])){
if(move_uploaded_file($_FILES['file']['tmp_name'] , "C:\xampp\htdocs\classpro\product-image\\".$_FILES['file']['name'])){
echo "";
}
else{
echo "Not Uploaded";
}
}



header("location: dashboard.php?msg=Updated Successfully"); 
}
}
if($action == "delete"){

$sql = "delete FROM product WHERE product_id=".$_REQUEST["proid"];

$data = mysqli_query($conn,$sql);
header("location: dashboard.php?msg=Deleted Successfully");
}

if($action=="update"){
$sql = "SELECT * FROM product WHERE product_id=".$_REQUEST["proid"];
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
}

?>
<?php */?>

<?php

$type = $_REQUEST["type"];


if($type == ""){

	$sql = "SELECT * FROM category";
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
else if($type == "subcat"){
	
	$sql = "SELECT * FROM sub-category where cat_id=".$_REQUEST["cat_id"];
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

echo $str;
?>




</body>
</html>
