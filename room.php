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

.single{
	 background-image: url("single.jpg");
	  width:500px;
	  height:500px;
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
  height: 100px;
  margin-left:120px;
  font-size: 16px;
  padding: 40px 40px;
  background: white;
}

.cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    grid-gap: 20px;
}

.card {
    display: grid;
    grid-template-rows: max-content 250px 1fr;
}

.card img {
    object-fit: cover;
    width: 100%;
    height: 100%;
}

.container{
	text-align:center;
	justify-content: center;  
align-items: center;  
}

.column {
  float: left;
  width: 33%;
  padding: 0 10px;
}


.row {margin: 0 -5px;}


.row:after {
  content: "";
  display: table;
  clear: both;
}



</style>

</head>

<body>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
<div class="img1">
<div class="box">	

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
    <a class="nav-link disabled" name="more" href="#">More</a>
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
</div>
</div>
<br>



<?php

    $CheckIn_Date=$_SESSION["checkin"];
    $CheckOut_Date=$_SESSION["checkout"];
	$chin=strtotime($CheckIn_Date);
	$chout=strtotime($CheckOut_Date);
	$datediff=$chout-$chin;
	$_SESSION["nights"]=round($datediff / (60 * 60 * 24));
	

$sql_query="SELECT *
FROM
    typeofroom

	
";

$sql="SELECT *
FROM
    typeofroom

	
";




//$result0=mysqli_query($conn,$sql_query0);	 
$result=mysqli_query($conn,$sql_query);

if(mysqli_num_rows($result)>0){
	echo "The available room is:<br>";

	echo '<div class="row">';
	while($row=mysqli_fetch_array($result)){
		 
	
		$sql_query1="SELECT count(*) as total
FROM room

WHERE Id_TR=$row[Id_TR];

";
$result1=mysqli_query($conn,$sql_query1);


$sql_query2="SELECT count(*) as total
FROM booking

WHERE  
              (('$CheckIn_Date' <= CheckIn_Date
				AND '$CheckOut_Date' >= CheckOut_Date) OR ('$CheckIn_Date' >= CheckIn_Date
				AND '$CheckOut_Date' <= CheckOut_Date)	OR ('$CheckIn_Date' <= CheckIn_Date
				AND '$CheckOut_Date' >= CheckOut_Date)OR ('$CheckIn_Date' <= CheckOut_Date
				AND '$CheckOut_Date' >= CheckOut_Date) )
				
				AND Id_TR=$row[Id_TR];


";
$result2=mysqli_query($conn,$sql_query2);

		while($row1=mysqli_fetch_assoc($result1)){
while($row2=mysqli_fetch_assoc($result2)){
	$total=$row1["total"]-$row2["total"];
	
 
         $output = '<input type="submit" name="'.$row["Name_TR"].'" class="btn btn-primary btn-lg btn-block" value="Book Now"/>';
    
   

		  
	if($total>0){

  echo '<div class="column">
    <div class="card">
        <header>
            <h2>'.$row["Name_TR"].'</h2>
        </header>  
        <img src="'.$row["photo"].'">
     <p>'.$row["Desc_TR"].' </p><p style="font-size:25px; color:blue;">The remaining rooms:'.$total.'<p style="font-size:25px; color:blue;">'.$row["Price_TR"].'$ per night </p><footer><form method="POST" autocomplete="off">'.
	
		$output.
	
	'</form></footer>

 
    </div>
  </div>
';

}else{
		continue;
	}

	
		}
	}


	if(isset($_POST[$row["Name_TR"]])){
		$qry1="SELECT * from typeofroom where Name_TR='".$row["Name_TR"]."'";
	$res1=mysqli_query($conn,$qry1);
	while($r1=mysqli_fetch_assoc($res1)){
		$_SESSION["Name_TR"]=$r1["Name_TR"];
		$_SESSION["Price_TR"]=$r1["Price_TR"];
		$_SESSION["Id_TR"]=$r1["Id_TR"];
	
	$_SESSION["total"]=$_SESSION["Price_TR"]*round($datediff / (60 * 60 * 24));
	
	}	
	echo("<script>location.href = 'payment.php';</script>");
		
		//echo $_SESSION["Name_TR"];
	

}




	}

	echo '</div>';
	
}
else{
	
echo "all room is not available";
}


 

?>

<?php


?>
 

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