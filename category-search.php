
<?php 
include "connection.php";

if($_POST["name1"]){
$sql = "SELECT * FROM product where product_name like '%".$_POST["name1"]."%'";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result)){
while($row=mysqli_fetch_assoc($result)){
?>
<div><a href="single.php?prodid=<?php echo $row['product_id']; ?>" ><img src="product-images/<?php echo $row["file1"];?>" alt="" width="50" height="50" /> &nbsp; <span> <?php echo $row["product_name"]?></span><br> 
</div>
<?php
}}
}
?>