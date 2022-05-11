<?php
session_start();

?>
<!DOCTYPE.html>
<html>
<head>
<title>Project</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap");
body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Montserrat", sans-serif;
  color: #fff;
  background-color: red;
}

h1 {
  font-weight: 900;
}

.container {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 16px;
  flex-direction: column;
}
.box {
  width: 350px;
  height: 460px;
  font-size: 16px;
  padding: 40px 40px;
  background: #0F044C;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  border-radius: 30px;
}
.user {
  margin-top: 50px;
}

.fas {
  position: absolute;
}
input {
  width: 90%;
  margin-bottom: 25px;
  padding: 0px 30px 15px;
  font-size: 16px;
  border: none;
  border-bottom: 1px solid #141E75;
  outline: none;
  background-color: #0F044C;
  color: #fff;
}
input:focus {
  border-bottom: 1px solid #EEEEEE;
}
.reset-password {
  color: #ff7f50;
  text-align: right;
  margin-top: 0px;
  font-size: 12px;
}
.login-btn {
    margin-top: 25px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.btn {
  display: block;
  width: 80%;
  padding: 15px;
  background-color: #EEEEEE;
  color: #0F044C;
  border: none;
  border-radius: 20px;
  font-size: 20px;
  font-weight: 600;
  opacity: 0.8;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.btn1 {
  display: block;
  width: 10%;
  padding: 5px;
  background-color: #EEEEEE;
  color: #0F044C;
   margin-left: 350px;
   margin-top:40px;
  border: none;
  border-radius: 20px;
  font-size: 20px;
  font-weight: 100px;
  opacity: 0.8;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.btn:hover{
    opacity: 1;
}

.btn1:hover{
    opacity: 1;
}


.signup span{
    color: #7fb8e6;
}
.signup span:hover{
    color: #3793df;
}
</style>
</head>
<body>
<form action ="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" autocomplete="off">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <div class="container">
        <div class="box">
				<?php
		if(isset($_GET["error"]))
	echo "<p style='color:red;'>". $_GET["error"]."</p>";
	
	?>
            <h1>Sign Up</h1>
            <div class="user">
                <input type="text" name="username" placeholder="Full name" />
				 <i class="fas fa-user"></i>
                <input type="text" name="email"  placeholder="Email Address" />
				 <i class="fas fa-envelope"></i>
                <input type="password" name="password"  placeholder="Password" />
                <i class="fas fa-unlock-alt"></i>
                <input type="password" name="cpassword"  placeholder="Confirm Password" />
				 <i class="fas fa-unlock-alt"></i>
            </div>

            <div class="login-btn">
                <button class="btn" name="submit">Submit</button><br>
                <p class="signup">Already have an account ? </p>
            </div>
        </div>
		<button class="btn1" name="login">Login</button>
    </div>


</form>

<?php
if(isset($_POST["submit"])){
	if(isset($_POST["username"])&& isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["cpassword"])) {
	$cid=mysqli_connect("localhost","root","","hotel") or die('error connecting');
		$username=mysqli_real_escape_string($cid,$_POST["username"]);
		$email=mysqli_real_escape_string($cid,$_POST["email"]);
$password=mysqli_real_escape_string($cid,$_POST["password"]);
$cpassword=mysqli_real_escape_string($cid,$_POST["cpassword"]);
$username=htmlspecialchars($username);
$email=htmlspecialchars($email);
$password=htmlspecialchars($password);
$cpassword=htmlspecialchars($cpassword);
if(!empty($_POST["password"])){
if(strcmp($password,$cpassword)==0){
$mysql_qry="insert into user(Username_User,Email_User,Password_User,Cpassword_User,Code_Role) values ('$username','$email','$password','$cpassword','1')";
if($cid->query($mysql_qry)===TRUE){
	echo "Inserted successfully";
}
else{
	echo "Error: " .$mysql_qry . "<br>" . $cid->error;
}

$cid->close();
}else{
	header("location:signup.php?error=Incorrect password");
}	
	
}else{
header("location:signup.php?error=Please enter your name and password");	
}
}
}else if(isset($_POST["login"])){
	header("location:login.php");
}
?>
</body>
</html>