 <?php
		  
$con=mysqli_connect("localhost","id14621531_root","/U3A]iz+Ad{d[XGN","id14621531_websitecustomers");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home - Rapid Pay</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="../css/index.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class = "bdy">
<br>
<div class ="div1">
    <a class = "button2" href="https://transactionview.000webhostapp.com/"></a>
</div>
<br>
<div class="div2">
<br>
<div class ="logo1">
<img src="../assets/logo470x120.png" class="logo1">
</div>
<br>
<h1>Cashless made effortless.</h1>
<h5>Built for India with all the features and rewards you love, plus much more.<br>Rapid Pay is the simplest way to send money home to your family.</h5>
<form action="../viewuser.php">
<button class='button1'>Get Started</button>
</form>
</div>
<div class="div3">
    <img src="../assets/banks_small.png" class="logo2">
</div>
<div class="footer">
        <br>
        <div class="footer_txt">Copyright &copy; Rapid Pay by Himanshu Churi
        <br>
		<a href="#" class="fa fa-facebook"></a>
		<a href="#" class="fa fa-twitter"></a>
		<a href="#" class="fa fa-google"></a>
		<a href="#" class="fa fa-linkedin"></a>
		</div>
    </div>
</body>

</html>
