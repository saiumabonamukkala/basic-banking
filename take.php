<html>
<head><title>Success</title>
<style>
body{
	background-image: url("other_bg.jfif");
    background-repeat: no-repeat;
    background-size:100%;
}
table,th,td{
                    color:black;
                    font-size: 20px;
                }
				table{width :80%;}
h1{
                    color: darkblue;
					font-size:30px;
                    padding-left: 100px;
					text-align:center;
					padding-top:30px;
                }
                .button {
  background-color:lightsalmon; /* Green */
  border: none;
  color: black;
  padding: 9px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius:30%;
  font-weight:bold;
				}
</style>
</head>
<body>
<?php
session_start();
$errors=array();
$con=mysqli_connect("localhost","root","","sparks");
if($con->connect_error)
die("Connection failed :".$con->connect_error);

$accname=mysqli_real_escape_string($con,$_POST['accno']);
$amount=mysqli_real_escape_string($con,$_POST['amt']);
if(count($errors)==0){
	echo "<center><h1><u>RECORD BEFORE WITHDRAWAL</u></h1></center>";
	$before=mysqli_query($con,"select * from customers where account_number='$accname'");
	if(mysqli_num_rows($before)>0){
echo "<center><table border='1'>
<tr>
<th>Account Number</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Address</th>
<th>Phone Number</th>
<th>Current Balance</th>
</tr>";

while($r = mysqli_fetch_array($before))
{
echo "<tr>";
echo "<td>" . $r['account_number'] . "</td>";
echo "<td>" . $r['first_name'] . "</td>";
echo "<td>" . $r['last_name'] . "</td>";
echo "<td>" . $r['email'] . "</td>";
echo "<td>" . $r['address'] . "</td>";
echo "<td>" . $r['phone_number'] . "</td>";
echo "<td>" . $r['current_balance'] . "</td>";
echo "</tr>";
}
echo "</table></center></br></br></br></br>";
}


	$result = mysqli_query($con,"select current_balance from customers where account_number='$accname'");
	$row = mysqli_fetch_array($result);
	if($row['current_balance']>$amount){
	$left_amt=$row['current_balance']-$amount;
	mysqli_query($con,"update customers set current_balance='$left_amt' where account_number='$accname'");
	}
	else{
		echo "<center><h2><i>REQUESTED AMOUNT IS HIGHER THAN CURRENT BALANCE, HENCE CANNOT BE PROCESSED</i></h2></center>";
	}
	echo "<center><h1><u>RECORD AFTER WITHDRAWAL</u></h1></center>";
	$sql=mysqli_query($con,"select * from customers where account_number='$accname'");
	if(mysqli_num_rows($sql)>0){
echo "<center><table border='1'>
<tr>
<th>Account Number</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Address</th>
<th>Phone Number</th>
<th>Current Balance</th>
</tr>";

while($r = mysqli_fetch_array($sql))
{
echo "<tr>";
echo "<td>" . $r['account_number'] . "</td>";
echo "<td>" . $r['first_name'] . "</td>";
echo "<td>" . $r['last_name'] . "</td>";
echo "<td>" . $r['email'] . "</td>";
echo "<td>" . $r['address'] . "</td>";
echo "<td>" . $r['phone_number'] . "</td>";
echo "<td>" . $r['current_balance'] . "</td>";
echo "</tr>";
}
echo "</table></center>";
}
}
else{
	array_push($errors,"No data found");
}

?>

<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
<form action="home.php" method="post">
<center><input class="button" type="submit" value="Home"/></center>
</form>
</body>
</html>