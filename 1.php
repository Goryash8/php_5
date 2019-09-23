<html>
<body>
    <form action="1.php" method="POST">
        <table style='border: 1px solid black ; width: 100%; text-align: center;'>
            <tr>
                <td>
                    keyword<input type="text" name="svalue"/>
                    <input type="submit"  name="search" value="search"/>
                </td>
            </tr>
        </table></form><br><br>
        <table style='border: 1px solid black;width: 100%;text-align: center;'>
            <tr>
                <th>customer id</th>
                <th>name</th>
                <th>email</th>
                <th>country</th>
                <th>budget</th>
                <th>used</th>
            </tr>
<?php
    $servername="localhost";
    $db="test";
    $con=mysqli_connect($servername,"root","",$db);
    if(!$con){
        die("connection error: "+mysqli_connect_error());
    }
    if(isset($_POST["search"])){
        $name=$_POST["svalue"];
        $mysql="SELECT * from customer where name like '$name'";
        $result=$con->query($mysql);

        if($result->num_rows > 0){
            while ($rows=$result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$rows['custumerid']."</td>";
                echo "<td>".$rows['name']."</td>";
                echo "<td>".$rows['email']."</td>";
                echo "<td>".$rows['countrycode']."</td>";
                echo "<td>".$rows['budget']."</td>";
                echo "<td>".$rows['used']."</td>";
                echo "</tr>";
            }
        }
    }
    echo "</table>";
?>
</body>
</html>