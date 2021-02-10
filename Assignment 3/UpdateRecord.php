<?php
	include_once("connection.php");
?>
<?php
	$username = $_GET['username'];
	$sql = "SELECT * FROM `users` WHERE `username` = '$username' ;";
	$result = mysqli_query($conn, $sql);
	$row = $result->fetch_assoc();
	$email = $row['email'];
	$gender = $row['gender'];
	$city = $row['city'];
?>

<html>
	<head>
		<title>UPDATE RECORD</title>
	</head>
	<body>
		<form method="POST">
			Username: <input type="text" name="username" value="<?php echo $username?>"placeholder="Type your username" required><br>
			Email: <input type="email" name="email" value="<?php echo $email?>" placeholder="Type your email" required><br>
			Gender: Male <input type="radio" name="gender" value="Male" <?php echo $gender == "Male" ? 'checked="checked"' : ''; ?>>
				   Female <input type="radio" name="gender" value="Female" <?php echo $gender == "Female" ? 'checked="checked"' : ''; ?>>
				   Others <input type="radio" name="gender" value="Others" <?php echo $gender == "Others" ? 'checked="checked"' : ''; ?>><br><br>
			City: <select name="city">
				<option value="<?php echo $city?>" selected><?php echo $city?></option>
				<option value="Ahmedabad">Ahmedabad</option>
				<option value="Dehradun">Dehradun</option>
				<option value="Dehli">Dehli</option>
				<option value="Gujrat">Gujrat</option>
				<option value="Hyderabad">Hyderabad</option>
				<option value="Jaipur">Jaipur</option>
				<option value="Khandala">Khandala</option>
				<option value="Lucknow">Lucknow</option>
				<option value="Mumbai">Mumbai</option>
				<option value="Pune">Pune</option>
				<option value="Srinagar">Srinagar</option>	
			</select><br>
			<input type="submit" name = "update" value="UPDATE">
		</form>
	</body>
</html>

 <?php
	if(isset($_POST['update'])){
		$name = $_POST['username'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$city = $_POST['city'];

		$sql = "UPDATE `users` SET username='$name', email='$email', gender='$gender', city='$city' WHERE username='$username'"; 
		if(mysqli_query($conn, $sql)){
			header("Location:Ques4_Table_to_Form_Assgn3.php");
		}
		else
			echo "Updation failed";
	}
?>