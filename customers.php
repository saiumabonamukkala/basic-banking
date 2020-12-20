<html>
<head>
<title>Customers</title>
<style>
body{
                background-image: url("other_bg.jfif");
                background-repeat: no-repeat;
                background-size:100%;
                }
                table,th,td{
                    color:black;
                    font-size: 25px;
                }
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
}</style>
</head>
<body>
<h1><u><b>CUSTOMERS</b></u></h1>
<?php
session_start();
$errors=array();
$con=mysqli_connect("localhost","root","","sparks");
if($con->connect_error)
die("Connection failed :".$con->connect_error);

if(count($errors)==0){
$result = mysqli_query($con,"SELECT * FROM customers");
if(mysqli_num_rows($result)>0){
echo "<table border='1'>
<tr>
<th>Account Number</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Address</th>
<th>Phone Number</th>
<th>Current Balance</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['account_number'] . "</td>";
echo "<td>" . $row['first_name'] . "</td>";
echo "<td>" . $row['last_name'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['address'] . "</td>";
echo "<td>" . $row['phone_number'] . "</td>";
echo "<td>" . $row['current_balance'] . "</td>";
echo "</tr>";
}
echo "</table>";
}
else{
	array_push($errors,"No data found");
}
}
mysqli_close($con);
?>


<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
</br></br>
<form action="home.php" method="post"/>
<center><input class="button" type="submit" value="Home" /></center>
</form>
</body>
</html>