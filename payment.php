<?php
session_start();
require "connection.php";

?>
<!DOCTYPE.html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Project</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap");

.nav-link{
	font-size: 30px; 
	text-decoration: none; 	
	}
	
.img1{

	 background-image: url("home.jpg");
	 z-index: 1;
 background-size: 100% 100%;
		     background-repeat: no-repeat;
			
}

.logo{
		 background-image: url("logo.png");
		 text-align:center;
	 width:100%;
	 height:100%;
	 margin-left:600px;
	   background-repeat: no-repeat;
		
}


.box {
  width: 100%;
  height: 340px;
  opacity:0.8;
  text-align:center;
  font-size: 16px;
  padding: 40px 40px;
  background: #0F044C;
 
}

.box1{

	 width: 80%;
  height: 300px;
  margin-left:120px;
  font-size: 16px;
  padding: 40px 40px;
  background: white;
}

.box2{

	 width: 90%;
  height: 180px;
  margin-left:90px;
  font-size: 16px;
  padding: 40px 40px;
  background: #CCCCFF;
}

.box3{

	width: 300px;
height: 200px;
top: 50%;
left: 50%;
margin-left: -150px;
margin-top: -100px;
  background: #CCCCFF;
}

.my-form {
  display: none;
}

.box4{
	text-align:center;
	background:white;
}

.credit-card {
    width: 360px;
    height: 400px;
    margin: 60px auto 0;
    border: 1px solid #ddd;
    border-radius: 6px;
    background-color: #fff;
    box-shadow: 1px 2px 3px 0 rgba(0,0,0,.10);
}

.form-header {
    height: 60px;
    padding: 20px 30px 0;
    border-bottom: 1px solid #e1e8ee;
}
 
.form-body {
    height: 340px;
    padding: 30px 30px 20px;

}

.card-number,
.cvv-input input,
.month select,
.year select {
    font-size: 14px;
    font-weight: 100;
    line-height: 14px;
}
 
.card-number,
.month select,
.year select {
    font-size: 14px;
    font-weight: 100;
    line-height: 14px;
}
 


.card-number {
    width: 100%;
    margin-bottom: 20px;
    padding-left: 20px;
    border: 2px solid #e1e8ee;
    border-radius: 6px;
}

h5{
	margin-left:740px;
}
.cvv-input input {
    float: left;
    width: 145px;
    padding-left: 20px;
    border: 2px solid #e1e8ee;
    border-radius: 6px;
    background: #fff;
}
 
.cvv-details {
    font-size: 12px;
    font-weight: 300;
    line-height: 16px;
    float: right;
    margin-bottom: 20px;
}
 
.cvv-details p {
    margin-top: 6px;
}

.paypal-btn,
.proceed-btn {
    cursor: pointer;
    font-size: 16px;
    width: 100%;
    border-color: transparent;
    border-radius: 6px;
}
 
.proceed-btn {
    margin-bottom: 10px;
    background: #7dc855;
}
 
.paypal-btn a,
.proceed-btn a {
    text-decoration: none;
}
 
.proceed-btn a {
    color: white;
}
 
.paypal-btn a {
    color: rgba(242, 242, 242, .7);
}
 
.paypal-btn {
    padding-right: 95px;
    background: url('paypal-logo.svg') no-repeat 65% 56% #009cde;
}

  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
  float:right;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
</head>
<body>

<form action="" method="POST">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
<div class="img1">
<div class="box">	
</form>


<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.nav-link')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<?php
if(isset($_POST["logout"])){
	echo"<script>var result = confirm('Want to delete?');
if (result) {
    //Logic to delete the item
}  </script>";
}

?>


<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" name="home" href="booking.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" name="foodserving" href="#">FoodServing</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" name="activities" href="#">Activities</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" name="contact" href="#">Contact</a>
  </li>
  <li class="nav-item">
   <div class="dropdown show">
  <a role="button" onclick="myFunction()" class="nav-link" >User<i class="arrow down"></i></a>
  <div id="myDropdown" class="dropdown-content">
    <a href="login.php" onclick="return confirm('Are You sure you want to logout?');" name="logout">Logout</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
  </div>
</div>
  </li>
</ul>
<div class="logo"></div>

</div>
<div class="box1">
<h3>Your booking is:</h3>
<?php
echo "<h4>";
echo "Checkin date: ".$_SESSION["checkin"]."   Checkout date: ".$_SESSION["checkout"]."  Persons: ".$_SESSION["person"];
echo "</h4>";
?>
<br>
<h3>Billing details</h3>
<div class="box2">
<?php
echo "<table style='width:800px;'><tr><th>Name<th>Room</th><th>Checkin-date</th><th>Checkout-date</th><th>Nights</th><th>Price</th></tr>
<tr><td>".$_SESSION["username"]."</td><td>".$_SESSION["Name_TR"]."</td><td>".$_SESSION["checkin"]."</td><td>".$_SESSION["checkout"]."</td><td>".$_SESSION["nights"]."</td><td>".$_SESSION["Price_TR"]."$"."</td></tr></table>";
echo "<br><h5>Total</h5><h5>".$_SESSION["total"]."$</h5>";
?>
</div>
<br>



</div></div>
<form class="credit-card" id="form" method="POST" action="">
  <div class="form-header">
    <h4>Credit card detail</h4>
  </div>
 
  <div class="form-body">

	<h6>Card Number:</h6>
    <input type="text" class="card-number" name="creditcard" placeholder="Card Number">
 <h6>Expiration date:</h6>
 
  <input type="date" name="expdate" placeholder="Expiration date"><br><br>
 <h6>CVV:</h6>
    <div class="card-verification">
      <div class="cvv-input">
        <input type="text" name="cvv" placeholder="CVV">
      </div>
      <div class="cvv-details">
        <p>3 or 4 digits usually found <br> on the signature strip</p>
      </div>
    </div>
 
    <!-- Buttons -->
    <button type="submit" class="proceed-btn" name="insertbooking">Submit</button>
  </div>
</form>

<?php

$Id_TR=$_SESSION["Id_TR"];
$qry="SELECT Id_Room FROM room WHERE Id_TR=$Id_TR AND Id_Room NOT IN(SELECT Id_Room FROM booking WHERE Id_TR=$Id_TR AND ('$_SESSION[checkin]' <= CheckIn_Date
				AND '$_SESSION[checkout]' >= CheckOut_Date)	)LIMIT 1;";
$res=mysqli_query($conn,$qry);
while($row=mysqli_fetch_assoc($res)){

if(isset($_POST["insertbooking"]) && !empty($_POST["creditcard"]) && !empty($_POST["expdate"]) && !empty($_POST["cvv"])){
	
	$mysql_qry="insert into booking(CheckIn_Date,CheckOut_Date,NbrOfPers,Id_TR,Id_Room,Id_User,Credit_Card_Number,CVV_credit_card,Expiration_date_credit_card_number) values ('
	$_SESSION[checkin]','$_SESSION[checkout]','$_SESSION[person]','$_SESSION[Id_TR]','$row[Id_Room]','$_SESSION[Id_User]','$_POST[creditcard]',
	'$_POST[cvv]','$_POST[expdate]')";

if($conn->query($mysql_qry)===TRUE){
	//echo "<script>window.alert('Booking is successfully submitted!');</script>";

}
else{
	echo "Error: " .$mysql_qry . "<br>" . $conn->error;
}

$qry1="SELECT max(Id_Book) as total1 from booking;";
$res1=mysqli_query($conn,$qry1);
while($row1=mysqli_fetch_assoc($res1)){

echo $row1["total1"];
//echo $idbook;
$mysql_qry1="insert into payment(Amount_Payment,Id_Book,Code_Type) values ('$_SESSION[total]','$row1[total1]','1')";

if($conn->query($mysql_qry1)===TRUE){
	echo $row1["total1"];

}
else{
echo "error";

}
}
}
}


?>

<br>
<br><br>
<div class="img1">
<div class="box">
<div class="logo"></div>
<h3 style="color:white;">Phone:71 529 953 &nbsp;
Location:Jbeil,Hboub &nbsp;
Mail:marimar@gmail.com</h3>
</div>
</div> 
</body>
</html>