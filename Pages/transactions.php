<?php
		  
$con=mysqli_connect("localhost","id14621531_root","/U3A]iz+Ad{d[XGN","id14621531_websitecustomers");

$user = "select * from Transaction ";

$result=mysqli_query($con,$user);
$row_count=mysqli_num_rows($result);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<html>
<head>
<title>
Transaction History - Rapid Pay</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="../css/transaction.css" >
</head>

<body>
	<body class = "bdy">
    <br>
    <div class ="div1">
    <a class = "button2" href="https://transactionview.000webhostapp.com/index.php"></a>
    <a class = "button3" href="https://transactionview.000webhostapp.com/viewuser.php">Back</a>
    </div>
    <br>
    <div class= "div2">

        <div class="form">

            <?php
            /*if(mysqli_fetch_assoc($result) != null){*/
            echo "<h1>User Details</h1> <table class=\"my_table\" border = '10' frame=\"void\" rules=\"NONE\">
            <tr>
            <th>ID</th>
            <th>From</th>
            <th>To</th>
            <th>Amount</th>
            </tr>";
            
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
		        echo "<td>" . $row['TransactionID'] . "</td>";
		        echo "<td>" . $row['FromName'] . "</td>";
		        echo "<td>" . $row['ToName'] . "</td>";
		        echo"<td>" . $row['AmountTransferred'] . "</td>";
		        echo "</tr>";
            }
            echo"</table>";
            /*}
            else{
                echo"<h1 class=\"nodata\">No Details To Show</h1>";
            }*/
            ?>
        </div>
    </div>
</body>
</html>
