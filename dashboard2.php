<?php
session_start();
error_reporting(0);
include('dbconnection.php');
include('index.php');
if (strlen($_SESSION['u_id']==0)) {
  header('location:logout.php');
  } 
   else
  {
  
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Expense Tracker System - Dashboard</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<style>
		.list{
			color: blue;
		}
	</style>
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
			<div class="heading">
				<h2 style="color: #2487ce;"> &nbsp; Check All Of Your Expenses:</h2>
			</div>
		</div>
		
		


		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
<?php
//Today Expense
$userid=$_SESSION['u_id'];
$tdate=date('Y-m-d');
$query=mysqli_query($con,"select sum(ExpenseCost) as todaysexpense from maintable where (ExpenseDate)='$tdate' && (UserId='$userid');");
$result=mysqli_fetch_array($query);
$sum_today_expense=$result['todaysexpense'];
?>
						<h4>Today's Expense</h4>
						<div class="list" data-percent="<?php echo $sum_today_expense;?>" >
						<span class="percent">
<?php if($sum_today_expense==""){
echo "0";
} else {
echo $sum_today_expense.Tk;
}
?>
						</span>
					</div>
					</div>
				</div>
			</div>
			<br>
			<div class="col2">
				<div class="panel panel-default">
					<?php
//Yestreday Expense
$userid=$_SESSION['u_id'];
$ydate=date('Y-m-d',strtotime("-1 days"));
$query1=mysqli_query($con,"select sum(ExpenseCost)  as yesterdayexpense from maintable where (ExpenseDate)='$ydate' && (UserId='$userid');");
$result1=mysqli_fetch_array($query1);
$sum_yesterday_expense=$result1['yesterdayexpense'];
 ?> 
					<div class="panel-body">
						<h4>Yesterday's Expense</h4>
						<div class="list" data-percent="<?php echo $sum_yesterday_expense;?>" >
						<span class="percent">
<?php if($sum_yesterday_expense=="")
{
echo "0";
} else {
echo $sum_yesterday_expense.Tk;
}
?>
						</span>
					</div>
					</div>
				</div>
			</div>
			<div class="col3">
				<div class="panel panel-default">
					<?php
//Weekly Expense
$userid=$_SESSION['u_id'];
 $pastdate=  date("Y-m-d", strtotime("-1 week")); 
$crrntdte=date("Y-m-d");
$query2=mysqli_query($con,"select sum(ExpenseCost)  as weeklyexpense from maintable where ((ExpenseDate) between '$pastdate' and '$crrntdte') && (UserId='$userid');");
$result2=mysqli_fetch_array($query2);
$sum_weekly_expense=$result2['weeklyexpense'];
 ?>
					<div class="panel-body">
						<h4>Last 7day's Expense</h4>
						<div class="list" data-percent="<?php echo $sum_weekly_expense;?>">
						<span class="percent">
<?php if($sum_weekly_expense=="")
{
echo "0";
} 
else 
{
echo $sum_weekly_expense.Tk;
}
?>
						</span>
					</div>
					</div>
				</div>
			</div>
			<div class="col4">
				<div class="panel panel-default">
					<?php
//Monthly Expense
$userid=$_SESSION['u_id'];
 $monthdate=  date("Y-m-d", strtotime("-1 month")); 
$crrntdte=date("Y-m-d");
$query3=mysqli_query($con,"select sum(ExpenseCost)  as monthlyexpense from maintable where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
$result3=mysqli_fetch_array($query3);
$sum_monthly_expense=$result3['monthlyexpense'];
 ?>
					<div class="panel-body">
						<h4>Last 30day's Expenses</h4>
						<div class="list" data-percent="<?php echo $sum_monthly_expense;?>" >
						<span class="percent">
<?php if($sum_monthly_expense=="")
{
						echo "0";
} else 
{
echo $sum_monthly_expense.Tk;
}
?>
					</span>
					</div>
					</div>
				</div>
			</div>
		
		</div>
			<div class="row">
			<div class="col5">
				<div class="panel panel-default">
<?php
//Yearly Expense
$userid=$_SESSION['u_id'];
 $cyear= date("Y");
$query4=mysqli_query($con,"select sum(ExpenseCost)  as yearlyexpense from maintable where (year(ExpenseDate)='$cyear') && (UserId='$userid');");
$result4=mysqli_fetch_array($query4);
$sum_yearly_expense=$result4['yearlyexpense'];
 ?>
					<div class="panel-body">
						<h4>Current Year Expenses</h4>
						<div class="list"  data-percent="<?php echo $sum_yearly_expense;?>" >
						<span class="percent">
							<?php if($sum_yearly_expense=="")
							{
								echo "0";
							} 
							else 
							{
								echo $sum_yearly_expense.Tk;
							}

							?>
	
						</span>
					</div>
					</div>
				</div>
			</div>

<div class="col6">
<div class="panel panel-default">
					
<?php
//Total Expense
$userid=$_SESSION['u_id'];
$query5=mysqli_query($con,"select sum(ExpenseCost)  as totalexpense from maintable where UserId='$userid';");
$result5=mysqli_fetch_array($query5);
$sum_total_expense=$result5['totalexpense'];
 ?>
					<div class="panel-body">
						<h4>Total Expenses</h4>
						<div class="list" data-percent="<?php echo $sum_total_expense;?>" >
						<span class="percent">
						<?php if($sum_total_expense=="")
						{
						echo "0";
						} 
						else
						{
						echo $sum_total_expense.Tk;
						}	?>
						</span>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>
<?php } ?>