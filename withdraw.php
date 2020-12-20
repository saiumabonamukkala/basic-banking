<html>
<head>
<style>
body{
	background-image: url("other_bg.jfif");
    background-repeat: no-repeat;
    background-size:100%;
}
form{
                   position: absolute;
                   top:150px;
                   left:500px;
                }
                legend{font-size: 30px; color:black; font-weight: bold;}
                label{ font-size:25px; text-align:center; }
                input[type=text]{width : 80%; height: 60%; padding: 12px 20px;}
                h2{
                    color:darkblue;
                }
                .button {
  background-color:palegreen;
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button1 {
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
  position:absolute;
  left :250px;
  top:450px;
}
</style>
</head>
<body>
<center><h1><u>WITHDRAW YOUR MONEY !!</u></h1></center>
    <center><h2><i>Do not save what is left after spending, but spend what is left after saving. </i></h2></center>
        <form action="take.php" method="post">
            <fieldset>
                <legend><u>Fill up these details</u></legend>
                <label>Enter your Name :</label><input type="text" name="name" required /> </br></br>
            <label>Enter your Account Number :</label><input type="text" name="accno"required /> </br></br>
            <label>Enter the Amount to withdraw:</label><input type="text" name="amt"required /> </br></br>
       <center><input class="button" type="submit" value="Withdraw"/></center>
            </fieldset>
        </form>
		<form action="home.php" method="post"/>
<center><input class="button1" type="submit" value="Home" /></center>
</form>
</body>
</html>