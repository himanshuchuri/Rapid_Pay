<?php
		  
$con=mysqli_connect("localhost","id14621531_root","/U3A]iz+Ad{d[XGN","id14621531_websitecustomers");

if(isset($_GET['UserID'])) 
	{   
    //Session Start
	session_start();	
	$_SESSION['UserID'] = $_GET['UserID'];
	}

$user1 = "select * from UserDetails ";

$result1=mysqli_query($con,$user1);
$row_count1=mysqli_num_rows($result1);
global $result1;
global $row_count1;


// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if(isset($_POST['transfer']))
{
    $from_id = $_POST['from_id'];
    $to_id = $_POST['to_id'];
    $credit_amt = $_POST['amount'];
    
    $from_query = "SELECT * FROM UserDetails WHERE UserID='$from_id'";
	$from_result = mysqli_query($con,$from_query);
	$row_from = mysqli_fetch_assoc($from_result);
	$from_name = $row_from['UserName'];
	$from_credit = $row_from['UserCredit'];
	

	$to_query = "SELECT * FROM UserDetails WHERE UserID='$to_id'";
	$to_result = mysqli_query($con,$to_query);
    $row_to = mysqli_fetch_assoc($to_result);
    $to_name = $row_to['UserName'];
    $to_credit = $row_to['UserCredit'];
    
    if((int)$credit_amt > (int)$from_credit)
    {
        echo "<script> alert('Insufficient Balance!!Please Try Again')</script>";
        echo "<script> window.location.assign('../viewuser.php')</script>";
    }
    else{
        
        $update_amt_1 = (int)$from_credit - (int)$credit_amt;
        $userf_finalcredit = "UPDATE UserDetails SET UserCredit = $update_amt_1  WHERE UserID=$from_id";
        $query = mysqli_query($con,$userf_finalcredit);
        
        $update_amt_2 = (int)$to_credit + (int)$credit_amt;
        $userto_finalcredit = "UPDATE UserDetails SET UserCredit = $update_amt_2  WHERE UserID=$to_id";
        $query = mysqli_query($con,$userto_finalcredit);
        
        $query_t2 = "SELECT * FROM Transaction";
        $result_t2 = mysqli_query($con,$query_t2);
        
        
        $query1 = "INSERT INTO Transaction(FromName,ToName,AmountTransferred) VALUES('$from_name','$to_name','$credit_amt')";
        $res2 = mysqli_query($con,$query1);
         echo "<script> alert('Transaction Successful')</script>";
        echo "<script> window.location.assign('../transactions.php')</script>";
    }
    
}
?>
<html>
<head>
<title>
Transfer - Rapid Pay</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="../css/transfer.css" >
</head>

<body>
	<body class = "bdy">
	    <?php 

	if(isset($_GET['errors'])){
		$error=$_GET['errors'];
		echo "<div class='alert alert-danger'>
            $error</div>";
			
	}
	if(isset($_GET['success'])){
		$success= $_GET['success'];
		echo "<div class='alert alert-success'>
           $success</div>";
	}?>
    <br>
    <div class ="div1">
    <a class = "button2" href="https://transactionview.000webhostapp.com/index.php"></a>
    <a class = "button3" href="https://transactionview.000webhostapp.com/viewuser.php">Back</a>
    </div>
    <br>
    <div class= "div2">
        <div class="form">
            <h1>Credit Transfer</h1>
            <form class="form1" method="post">
            <p> From:</p>
            <?php
                $id = $_GET['UserID'];
                $q = "select * from UserDetails where UserID= " .$id;

                $res=mysqli_query($con,$q);
                echo"<input name=\"from_id\" type=\"hidden\" value=" .$id.">";
                echo "<table class=\"my_table\" border = '10' frame=\"void\" rules=\"NONE\">
                <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Credit</th>
                </tr>";
            
                while($row1 = mysqli_fetch_assoc($res))
                {
                echo "<tr>";
		        echo "<td>" . $row1['UserName'] . "</td>";
		        echo "<td>" . $row1['UserEmail'] . "</td>";
		        echo "<td>" . $row1['UserCredit'] . "</td></tr>";
                }
                echo"</table>";
            ?>
            <p> Select Name:</p>
            <select id="options" required name="to_id">
			<option value="">Select User</option>
                <?php
                    while($row = mysqli_fetch_array($result1))
                    {?>
                    <option value="<?php echo $row['UserID'];?>"><?php echo $row['UserName'] ;?></option>
					<?php
                    }
				?>
            </select>
            
            <input class="amt" type="number" placeholder="Enter Amount" name="amount" required>
            <a herf="../transactions.php"><button type="submit" class="subbtn"  name="transfer">transfer</button></a>
            </form>
            
            </div>
    </div>
</body>
</html>
