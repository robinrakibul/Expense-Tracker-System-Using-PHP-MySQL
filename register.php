<?php 
session_start();
error_reporting(0);
include('dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['name'];
    $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
	$monthlyincome=$_POST['monthlyincome'];
    $ret=mysqli_query($con, "select Email from usertable where Email='$email' ");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email  associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into usertable(FullName, MobileNumber, Email,  Password, monthlyincome) value('$fname', '$mobno', '$email', '$password', '$monthlyincome')");
	if ($query) {
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Expense Tracker System - Signup</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
  	<link href="css/style.css" rel="stylesheet">
<body>
	<div class="row">
			<h2 align="center">Expense Tracker System</h2>
	<hr />
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading"><h3>Register</h3></div>
				<div class="panel-body">
					<form role="form" action="" method="post" id="" name="signup">
						<p style="font-size:16px; color:red" align="center"> 
						<?php if($msg){
 						   echo $msg;
  									}  ?>
						</p>
						<fieldset class="align-items-center">
							<div class="form-group">
								<input class="form-control" placeholder="Full Name" name="name" type="text" required="true">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" required="true">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" maxlength="11" pattern="[0-9]{11}" required="true">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required="true">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Repeat Password" required="true">
							</div>
							<div class="form-group">
								<input type="number" class="form-control" id="monthlyincome" name="monthlyincome" placeholder="Insert Monthly Income" required="true">
							</div>
							<div class="checkbox">
								<button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button>
								<span>
								<a href="login.php" class="btn btn-primary">Login</a></span>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
