<?php
		  
$con=mysqli_connect("localhost","id14621531_root","/U3A]iz+Ad{d[XGN","id14621531_websitecustomers");

$user = "select * from UserDetails ";

$result=mysqli_query($con,$user);
$row_count=mysqli_num_rows($result);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<html>
<head>
<title>
User - Rapid Pay</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="../css/viewuser.css" >
</head>

<body>
	<body class = "bdy">
    <br>
    <div class ="div1">
    <a class = "button2" href="https://transactionview.000webhostapp.com/index.php"></a>
    <a class = "button3" href="https://transactionview.000webhostapp.com/index.php">Back</a>
    <a class = "button4" href = "https://transactionview.000webhostapp.com/transactions.php">Transaction History</a>
    </div>
    <br>
    <div class= "div2">

        <div class="form">
            <h1>User Details</h1>

            <?php
            echo "<table class=\"my_table\" border = '10' frame=\"void\" rules=\"NONE\">
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Credit</th>
            <th>Action</th>
            </tr>";
            
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
		        echo "<td>" . $row['UserName'] . "</td>";
		        echo "<td>" . $row['UserEmail'] . "</td>";
		        echo "<td>" . $row['UserCredit'] . "</td>";
		        echo "<td><a class='text-white' href='transfer.php?UserID= ".$row['UserID']." '><button class=\"button5\">Info</button></a></td>";
		        echo "</tr>";
            }
            echo"</table>";
            ?>
            </div>
    </div>
</body>
</html>
