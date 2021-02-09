<html>
	<head>
		<title>Add Two Variables</title>
	</head>
	<body>
		<form method="post" action="Ques2_Add_two_variables_Assgn_3.php">
			Variable 1<input type="text" name="var1">
			Variable 2<input type="text" name="var2">
			<br>
			<input type="submit" name="submit">
		</form>
	</body>
</html>

<?php
	if(isset($_POST['submit'])){
		if(empty($_POST['var1']) || empty($_POST['var2']))
			echo "No input";
		else{
			$sum = $_POST['var1'] + $_POST['var2'];
			echo "Sum of two variables is $sum";
		}
	}
?>