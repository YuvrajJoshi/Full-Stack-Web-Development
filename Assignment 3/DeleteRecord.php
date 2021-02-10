<?php
	include_once("connection.php");
?>
<html>
	<body>
		<form method="post">
			Are you sure you want to delete the record?
			<input type="submit" name="confirm" value="Yes">
			<a href="Ques4_Table_to_Form_Assgn3.php"><input type="button" name="cancel" value="Cancel"></a>
		</form>
	</body>
</html>
<?php
	if(isset($_POST['confirm'])){
		$username = $_GET['username'];
		$sql = "DELETE FROM `users` WHERE username='$username'";
			if(mysqli_query($conn, $sql))
				echo "Deletion successful";
	}
?>