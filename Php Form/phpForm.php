
<html>
	<head>
		<title>FORM</title>
	</head>
	<body>
		<form method="POST" action="phpForm.php">
			Username: <input type="text" name="username" placeholder="Type your username" required><br>
			Email: <input type="email" name="email" placeholder="Type your email" required><br>
			Contact No: <input id="phno" type="text" name="contact" placeholder="Type your contact" required><br>
			City: <select name="city">
				<option value="none" disabled selected hidden>Choose City</option>
				<option value="Ahmedabad">Ahmedabad</option>
				<option value="Dehradun">Dehradun</option>
				<option value="Dehli">Dehli</option>
				<option value="Hyderabad">Hyderabad</option>
				<option value="Jaipur">Jaipur</option>
				<option value="Mumbai">Mumbai</option>
			</select><br>
			Course: <input type="text" name="course" placeholder="Type your course" required><br>
			Interests: <br>Programming<input type="checkbox" name="interests[]" value="Programming">
						   Sports<input type="checkbox" name="interests[]" value="Sports">
						   Reading<input type="checkbox" name="interests[]" value="Reading">
						   Writing<input type="checkbox" name="interests[]" value="Writing">
						   Drawing<input type="checkbox" name="interests[]" value="Drawing">
						   Gaming<input type="checkbox" name="interests[]" value="Gaming">
						   Acting<input type="checkbox" name="interests[]" value="Acting">
						   Singing<input type="checkbox" name="interests[]" value="Singing">
						   Dancing<input type="checkbox" name="interests[]" value="Dancing"><br>
			<input id="submitBtn" type="submit" name="submit" value="Click here to submit your data" onclick="checkInputs()">
		</form>
	<script>
		let phno = document.getElementById("phno");
		let checkboxes = document.getElementsByName("interests[]");

		function checkContact(){
			if(phno.value.length !== 10){
				alert("Contact no. should be 10 digits");
				return false;
			}
			return true;
		}

		function checkInterests(){
			let count = 0;
			for(let i = 0; i < checkboxes.length; i++){
				if(checkboxes[i].checked === true)
					count++;
			}
			if(count >= 3 && count <= 5)
				return true;
			alert("There should be minimum 3 and maximum 5 interest selections");
			return false;
		}

		function checkInputs(){
			if(checkContact() && checkInterests())
				return true;
			return false;
		}
	</script>
	</body>
</html>

<?php

	if(isset($_POST['submit'])){
		if(!(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['contact']) || empty($_POST['course']) )){
			$name = $_POST['username'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];
			$city = $_POST['city'];
			$course = $_POST['course'];
			$interestArray = $_POST['interests'];
			$count = count($interestArray);
			$interest_string = "";
			if($count >= 3 && $count <= 5){
				foreach($interestArray as $intkey => $intvalue){
					$interest_string .=  $intvalue . ",";
				}
			$interest_string = substr($interest_string, 0, -1);
				echo "
						<table>
							<tr>
								<th>Name</th> <th>Email</th> <th>Contact</th> <th>City</th> <th>Course</th> <th>Interests</th>
							</tr>
							<tr>
								<td>$name</td> 
								<td>$email</td> 
								<td>$contact</td> 
								<td>$city</td> 
								<td>$course</td> 
								<td>$interest_string</td>
							</tr>
						</table>
				";
			}
		}
	}
?>