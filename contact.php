<?php 
$conn = mysqli_connect("localhost", "root", "", "expense") or die($conn);
if((isset($_POST['name'])&& $_POST['name'] !='') && (isset($_POST['email'])&& $_POST['email'] !=''))
{
$name = $conn->real_escape_string($_POST['name']);
$subject = $conn->real_escape_string($_POST['subject']);
$email = $conn->real_escape_string($_POST['email']);
$message = $conn->real_escape_string($_POST['message']);
$sql="INSERT INTO contact (name, subject, email, message) VALUES ('".$name."','".$subject."', '".$email."', '".$message."')";
if(!$result = $conn -> query($sql)){
die('There was an error running the query ['. $conn->error .']');
}
else
{
echo "<h1>The mail is successfully sent! I will read your message soon.</h1>";
echo "<br> <h2>Redirecting to Homepage in 5 seconds</h2>";
      header("refresh:5;url=index.html");
}
}
else
{
echo "Please fill everything clearly, an error has occured.";
}
?>

<html>
    <head>
        <style>
    h1{
    color: #2487ce;
        }

    h2 {
    color: #185886;
    }
        </style>
    </head>
    <body>
    </body>
</html>