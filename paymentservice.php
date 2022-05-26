<?php session_start();
require "connection.php";?>
<!DOCTYPE.html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://www.w3schools.com/lib/w3.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<title>Project</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap");
.img1{

	 background-image: url("service.jpg");
	 z-index: 1;
	 width:100%;
	 height:90%;
 background-size: 100% 100%;
		     background-repeat: no-repeat;
			
}


.box {
  width: 100%;
  height: 200px;
  opacity:0.8;
  font-size: 16px;
  
  background: #212129;
 
}

h2{
	color:white;
}

h3{
	color:white;
	margin-Left:400px;
}

.box1{

	 width: 80%;
  height: 100px;
  margin-left:120px;
  margin-top:370px;
  font-size: 16px;
  padding: 5px 5px;
  background: white;
}#hide { opacity: 0; }
#hide:target {opacity: 1;}
#hide1 { opacity: 0; }
#hide1:target {opacity: 1;}
#hide2 { opacity: 0; }
#hide2:target {opacity: 1;}

#container{
	margin-top:470px;
}
.content:not(:first-child) {
    display: none;
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
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  width:220px;
  height:50px;

  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 19px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.button2{
 background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}
.button2:hover {
  background-color: #008CBA;
  color: white;
}
.card {
    float: center;
	margin-Left:420px;
    width: 100%;
	height:550px;
    padding: .75rem;
    height:80vh;
    margin-bottom: 2rem;
    border: 0;
    box-shadow: 0px 0px 8px 0.3px rgba(0,0,0,1);
}

.card-footer{
	margin-Left:55px;
}
</style>

</head>
<body>
<div class="card border-success mb-3" style="max-width: 28rem">
  <div class="card-header bg-transparent border-success">    <?php

echo '<img width="550px" height="490px" src="'.$_SESSION["photomenu"].'"<br>';?></div>
  <div class="card-body text-success">
 
    <h5 class="card-title">Quantity:</h5>
  <form action="" method="POST" class="amount" id="my_form"><input type="number" value="1" class="equipCatValidation" name="quantity" min="1" max="5"><br><br>
   <h5 class="card-title">Price:</h5>
 <div class="cost"><?php echo $_SESSION["PriceItem"];  ?>$</div><br>
  <h5 class="card-title">Total:</h5>
 <div class="total"  name="tot"><?php echo $_SESSION["PriceItem"];
?>
</div>
<?php  ?>
  <div class="card-footer bg-transparent border-success"><input type="submit" name="ordermenu" onclick="return confirm('Are You sure to order?');" id="button button2"class="button button2" value="Order"/></form></div>
</div>

</div>
<script>
$(document).ready(function(){
   $("#my_form").on("submit", function () {
        var hvalue = $('.total').text();
        $(this).append("<input type='hidden' name='tot' value=' " + hvalue + " '/>");
    });
});

</script>
<?php
if(isset($_POST["ordermenu"])){
$_SESSION["total"]=$_SESSION["PriceItem"]*$_POST["quantity"];
$qry="insert into room_service(Date_Room_Service,Time_Room_Service,Cost_Room_Service,Id_Book)values('$_SESSION[date]','$_SESSION[time]','$_SESSION[PriceItem]','$_SESSION[idbook]');";
if($conn->query($qry)===TRUE){
$qry1="SELECT max(Id_Room_Service) as total from room_service;";	
$res1=mysqli_query($conn,$qry1);
while($row1=mysqli_fetch_assoc($res1)){
	$qry2="SELECT Id_Item from menu_item where Name_Item='$_SESSION[Name_Item]';";	
$res2=mysqli_query($conn,$qry2);
while($row2=mysqli_fetch_assoc($res2)){
	
$qry3="insert into room_service_menu_item(Id_Room_Service,Id_Item,Quantity,Price_Room_Service_Menu_Item)values('$row1[total]','$row2[Id_Item]','$_POST[quantity]','$_SESSION[total]');";		
if($conn->query($qry3)===TRUE){
	echo "Inserted successfully";
}else{
	echo "Error2";
	
}
$qry4="insert into payment_room_service(Amount_room_service,Code_Type,Id_Book)values('$_SESSION[total]',1,'$_SESSION[idbook]');";
if($conn->query($qry4)===TRUE){
	echo "Inserted successfully";
}else{
	echo "Error2";
	
}
}
}
}else{
	echo "Error1";
}


}

?>


<script>
$('.equipCatValidation').on('keydown keyup change', function(e){
    if ($(this).val() > 5 
        && e.keyCode !== 46 // keycode for delete
        && e.keyCode !== 8 // keycode for backspace
       ) {
       e.preventDefault();
       $(this).val(5);
    }
});

</script>
<script>

$('.amount > input[type="number"]').on('input', updateTotal);

function updateTotal(e){
  var amount = parseInt(e.target.value);
  
  if (!amount || amount < 0)
    return;
    
  var $parentRow = $(e.target).parent().parent();
  var cost = parseFloat($parentRow.find('.cost').text());
  var total = (cost * amount).toFixed(2);

  $parentRow.find('.total').text(total);
  
    
}

</script>


</body>

</html>
