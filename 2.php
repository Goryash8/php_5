<!DOCTYPE html>
<html>
<head>
	<style>
		table tr,td;{
			padding:10px;
		}
	</style>
</head>
<body>
<h1>register here</h1>
<p>fill in your name and email address,then click on <b>submit</b>to register.</p>
<form action="2.php" method="POST">
	name: <input type="text" name="name"/><br>
	email: <input type="email" name="email"/><br>
	<input type="submit" name="submit" value="submit"/><br>
</form>
<h1>people who are registered  : </h1>
<table>
	<tr>
		<th>name</th>
		<th>email</th>
		<th>Date</th>
	</tr>
	<?php 
		$servername="localhost";
		$username="root";
		$db="test";
		$con=mysqli_connect($servername,$username,"",$db);
		if(!$con)
			die("connection error : "+mysqli_connect_error());
		$table="CREATE TABLE registration 
		(
			name varchar(20),
			email varchar(10),
			Date date
		);";
		mysqli_query($con,$table);
		if(isset($_POST["submit"]))
		{
			$name=$_POST["name"];
			$email=$_POST["email"];
			$date=date("Y-m-d");
			$mysql="INSERT INTO registration(name,email,Date) VALUES('$name','$email','$date');";
			$con->query($mysql);
			echo mysqli_error($con);
		}
		$mysql1="SELECT * FROM registration";
		$result=$con->query($mysql1);
		if($result->num_rows > 0){
			while($row=mysqli_fetch_row($result))
			{
				echo "<tr>";
	         	   echo "<td>" . $row[0] . "</td>";
	            	echo "<td>" . $row[1] . "</td>";
	            	echo "<td>" . $row[2] . "</td>";
	            echo "</tr>";
        	}
    	}
    echo "</table>";
?>
</body>
</html>