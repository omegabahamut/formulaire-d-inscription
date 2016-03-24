<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$position = $_POST['position'];
		
	// checking empty fields
	if(empty($name) || empty($username) || empty($password) || empty($position)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($username)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		
		if(empty($password)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}
		
		if(empty($position)) {
			echo "<font color='red'>Position field is empty.</font><br/>";
		}
		
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysql_query("INSERT INTO user(name,username,password,position) VALUES('$name','$username','$password','$position')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='login.html'>Retour au menu de connexion</a>";
	}
}
?>
</body>
</html>
