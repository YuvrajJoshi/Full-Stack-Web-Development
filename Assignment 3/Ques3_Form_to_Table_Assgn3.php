<?php
	include_once('connection.php');
?>

<html>
	<head>
		<title>FORM</title>
	</head>
	<body>
		<form method="POST" action="Ques3_Form_to_Table_Assgn3.php">
			Username: <input type="text" name="username" placeholder="Type your username" required><br><br>
			Email: <input type="email" name="email" placeholder="Type your email" required><br><br>
			Gender: Male <input type="radio" name="gender" value="Male">
				   Female <input type="radio" name="gender" value="Female">
				   Others <input type="radio" name="gender" value="Others"><br><br>
			City: <select name="city">
				<option value="" disabled selected hidden>Choose City</option>
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
			</select><br><br>
			<input id="submitBtn" type="submit" name = "submit" value="SUBMIT" onclick="checkInputs()">
		</form>
	</body>
</html>

<?php
	if(isset($_POST['submit'])){
		if(!(empty($_POST['username']) || empty($_POST['email']) || !isset($_POST['gender']) || !isset($_POST['city']))){
			$username = $_POST['username'];
			$email = $_POST['email'];
			$gender = $_POST['gender'];
			$city = $_POST['city'];

			$sql = "INSERT INTO `users` (`id`, `username`, `email`, `gender`, `city`) VALUES (NULL, '$username', '$email', '$gender', '$city');";
			mysqli_query($conn, $sql);

		}
		else
			echo "Please fill in all the values before submitting";			
	}
?>