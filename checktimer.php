<!DOCTYPE HTML> 
<html> 
<head> 
<style> 
body{ 
    text-align: center; 
    background: #ffffff; 
  font-family: sans-serif; 
  font-weight: 100; 
} 
h1{ 
  color: #396; 
  font-weight: 100; 
  font-size: 40px; 
  margin: 40px 0px 20px; 
} 
 #clockdiv{ 
    font-family: sans-serif; 
    color: #fff; 
    display: inline-block; 
    font-weight: 100; 
    text-align: center; 
    font-size: 30px; 
} 
#clockdiv > div{ 
    padding: 10px; 
    border-radius: 3px; 
    background: #00BF96; 
    display: inline-block; 
} 
#clockdiv div > span{ 
    padding: 15px; 
    border-radius: 3px; 
    background: #00816A; 
    display: inline-block; 
} 
smalltext{ 
    padding-top: 5px; 
    font-size: 16px; 
} 
</style> 
</head> 
<body> 
<h1>Countdown Clock</h1> 
<div id="clockdiv"> 
  <div> 
    <span class="days" id="day"></span> 
    <div class="smalltext">Days</div> 
  </div> 
  <div> 
    <span class="hours" id="hour"></span> 
    <div class="smalltext">Hours</div> 
  </div> 
  <div> 
    <span class="minutes" id="minute"></span> 
    <div class="smalltext">Minutes</div> 
  </div> 
  <div> 
    <span class="seconds" id="second"></span> 
    <div class="smalltext">Seconds</div> 
  </div> 
</div> 
  
<p font-size=7 id="demo"></p> 
  
<script> 
  
var deadline = new Date("Aug 20, 2022 17:46:25").getTime(); 
  
var x = setInterval(function() { 
  
var now = new Date().getTime(); 
var t = deadline - now; 
var days = Math.floor(t / (1000*60*60*24)); 
var hours = Math.floor((t%(1000*60*60*24))/(1000 * 60 * 60)); 
var minutes = Math.floor((t%(1000*60*60)) / (1000 * 60)); 
var seconds = Math.floor((t%(1000*60)) / 1000); 
document.getElementById("day").innerHTML =days ; 
document.getElementById("hour").innerHTML =hours; 
document.getElementById("minute").innerHTML = minutes;  
document.getElementById("second").innerHTML =seconds;  
if (t < 0) { 
        clearInterval(x); 
        document.getElementById("demo").innerHTML = "TIME UP"; 
        document.getElementById("day").innerHTML ='0'; 
        document.getElementById("hour").innerHTML ='0'; 
        document.getElementById("minute").innerHTML ='0' ;  
        document.getElementById("second").innerHTML = '0'; } 
}, 1000); 
</script>









<?php
$result = mysqli_query($conn, "SELECT * FROM timer ORDER BY id DESC");
while($res = mysqli_fetch_array($result)) { 
echo $date = $res['date']; echo "<br>";
echo $h = $res['h'];echo "<br>";
echo $m = $res['m'];echo "<br>";
echo $s = $res['s'];echo "<br>";
}
?>



<form method="POST" action="#">
Date*<input type="date" name="date" value="<?php echo $date;?>">
H* <input type="number" name="h" value="<?php echo $h;?>">
M* <input type="number" name="m" value="<?php echo $m;?>">
S*<input type="number" name="s" value="<?php echo $s;?>">
<button type="submit" name="update">Update</button>
</form> 
</body> 
</html> 