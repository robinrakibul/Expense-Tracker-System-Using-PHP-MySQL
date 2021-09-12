<?php
session_start();
error_reporting(0);
include('dbconnection.php');
include('index.php');
if (strlen($_SESSION['u_id']==0)) {
  header('location:logout.php');
  } else{

  

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Expense Tracker System - Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<?php include_once('header.php');?>
	<?php include_once('sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h2 style="color:#2487ce"> 
				<?php echo  $row['FullName']."!";?> Welcome to Dashboard </h2>
		<br>

<?php
$userid=$_SESSION['u_id'];
$monthdate=  date("Y-m-d", strtotime("-1 month")); 
$crrntdte=date("Y-m-d");
$query3=mysqli_query($con,"select sum(ExpenseCost)  as monthlyexpense from maintable where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
$result3=mysqli_fetch_array($query3);
$sum_monthly_expense=$result3['monthlyexpense'];
if ($sum_monthly_expense==NULL)
	$sum_monthly_expense=0;

$query4=mysqli_query($con,"select monthlyincome from usertable where (ID='$userid');");
$result4=mysqli_fetch_array($query4);
?>

<span>
<h3 style="color:red">Warning! <br> Your This Month's Total Expense:</h3>
		<td>
		<h3 style="color:#2487ce;">
			<?php echo $sum_monthly_expense.Tk;?>
			<?php echo $row['result4'];?>
		</h3>
		</h3>
</span>
<span>
	<h3 style="color:30a5ff">Check Your Previous Records</h3>
	<h3><a href="dashboard2.php" class="btn-get-started">Click Here!</a></h3>
</span>
	</div>
	</div>	
</div>
</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
</body>
</html>
<?php } ?>