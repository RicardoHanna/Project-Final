<?php
session_start();
if(isset($_POST["typeroom"])){
	$_SESSION["checkin"]=$_POST["checkin"];
	$_SESSION["checkout"]=$_POST["checkout"];
	$_SESSION["person"]=$_POST["person"];
	if(empty($_POST["checkin"]) || empty($_POST["checkout"]) || empty($_POST["person"]) || $_POST["checkin"] >= $_POST["checkout"] ){

		header("location:booking.php?error=one of this field is empty!");

}else{
	
	header("location:room.php");
}
}
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
	
	h2{
		color:white;
		font-family:impact;
		text-align:center;
		font-size: 56px;
		
		margim-top:290px;
	}
	
	h4{
		color:white;
		text-align:center;
		font-size: 23px;
		font-family:fantazy;
	
		margim-top:390px;
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
#map {
            height: 400px;
            width: 400px;
        }

.img1{

	 background-image: url("blog.jpg");
	 z-index: 1;
 background-size: 100% 100%;
		     background-repeat: no-repeat;
			
}

.img2{

	 background-image: url("flag.jpg");
	 background-repeat: no-repeat;
	  background-size: 3000px 5000px;

	
}

.img3{
	margin-top:1px;
}

.logo{
		 background-image: url("logo.png");
		 text-align:center;
	 width:100%;
	 height:100%;
	 margin-left:600px;
	   background-repeat: no-repeat;
		
}

h3{
	color:white;
		
		font-size: 26px;
		font-family:impact;
		margim-top:290px;	
}

p{
	color:black;
		margin-left:10px;
		font-size: 26px;
		font-family:impact;
			
}

.box1{

	 width: 80%;
  height: 100px;
  margin-left:120px;
  font-size: 16px;
  padding: 40px 40px;
  background: white;
}
.box2{

	 width: 10%;
  height: 5px;
  text-align:center;
  margim-top:2px;
  color:white;
  margin-left:640px;
  font-size: 16px;
  padding: 20px 20px 20px 20px;
  background: yellow;
}

.box3 {
  width: 100%;
  height: 340px;
  opacity:0.8;
  font-size: 16px;
  padding: 40px 40px;
  background: #0F044C;
 
}

.column{

	 float: left;
  width: 50%;
  padding: 10px;

}
.row:after {
  content: "";
  display: table;
  clear: both;
}
p{
	font-family:impact;
}
</style>

</head>
<body>
<form action ="" method="POST" autocomplete="off">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
<div class="img1">
<div class="box">	
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" name="home" href="#">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" name="fooditems" href="#">Room Service</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" name="activities" href="#">Activities</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" name="contact" href="#">Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" name="more" href="#">More</a>
  </li>
</ul>
</form>
<h2>Hotel Booking</h2>
<div class="logo"></div>

</div>
<h2>Book Stay</h2><br><br>
<h4>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided inside a hotel room may range from a modest-quality mattress in a small room to large suites with bigger, higher-quality beds, a dresser, a refrigerator and other kitchen facilities, upholstered chairs, a flat screen television, and en-suite bathrooms.</h4>
<br><br>
<div class="box2">Book now
</div>
<form action ="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" autocomplete="off">
<div class="box1">
<label>CheckIn:</label>
  <input type="date" placeholder="CheckIn" name="checkin">
  <label>CheckOut:</label>
  <input type="date" placeholder="CheckOut" name="checkout">
   <label>Person:</label>
  <input type="number" placeholder="Persons" name="person">
<input type="submit" value="search" class="btn btn-warning"  name="typeroom">
  <?php
		if(isset($_GET["error"]))
	echo "<div style='color:red;'>". $_GET["error"]."</div>";
	
	?>

  
</div>
</form>

<br><br><br>
</div>
<form action ="" method="POST" autocomplete="off">
<div class="row">
<div class="column">
<p>Location:<p>
<div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31419.973789168806!2d35.659584786798526!3d34.13053016643135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f5b68ebae5db5%3A0xca61dd269c6441f6!2sHboub!5e0!3m2!1sen!2slb!4v1651307292277!5m2!1sen!2slb" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</div>
<div class="column">
<p>Hotel:<p>
<p>Come alone or bring your family with you,stay here<br>
for a night or for a weeks,stay here while on a business<br>
or a some kind of conference-either way our hotel is the best<br>
possible variant.Feel free to contact us anytime in case you have any.<br>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
  <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
</svg><i class="bi bi-check2">4 stars</i><br>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
  <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
</svg><i class="bi bi-check2">Marimar-Byblos</i><br>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
  <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
</svg><i class="bi bi-check2">Phone:+961-034-457-932</i></p>
</div>
</div>
</form>

<div class="img1">
<div class="box">
<div class="logo"></div>
<h3>Phone:71 529 953 &nbsp;
Location:Jbeil,Hboub &nbsp;
Mail:marimar@gmail.com</h3>
</div>
</div>




	
		

		</body>
		
		</html>