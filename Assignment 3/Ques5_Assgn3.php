<?php
	include_once("connection.php");
?>


<html>
	<head>
		<title>Manipulate</title>
	</head>
	<body>
		<form method="post" action="Ques5_Assgn3.php">
			Enter Username: <input type="text" name="username" placeholder="Type username here" required>
			<br>
			<input type="submit" name="show" value="SHOW DETAILS">
		</form>
	</body>
</html>

<?php
	if(isset($_POST['show'])){
		$name = $_POST['username'];
		$sql = "SELECT * from `users` WHERE username='$name';";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) != 0){
			$row = $result->fetch_assoc();
			$username = $row['username'];
			$email = $row['email'];
			$gender = $row['gender'];
			$city = $row['city'];	
			?>

			<table border="1px">
				<thead>
					<th>Username</th>
					<th>Email</th>
					<th>Gender</th>
					<th>City</th>
					<th>Edit</th>
					<th>Delete</th>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $username ?></td>
						<td><?php echo $email ?></td>
						<td><?php echo $gender ?></td>
						<td><?php echo $city ?></td>
						<td><a href="UpdateRecord.php?username=<?php echo $username?>"><input type="button" value="Edit"></a></td>
						<td><a href="DeleteRecord.php?username=<?php echo $username?>"><input type="button" value="Delete"></td>
					</tr>
				</tbody>
			</table>
	<?php		
	   }
		else
			echo "Username does not exist";
	}	
?>