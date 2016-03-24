<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];	
	$position=$_POST['position'];	
	
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
		//updating the table
		$result = mysql_query("UPDATE user SET name='$name',username='$username',password='$password',position='$position' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysql_query("SELECT * FROM users WHERE id=$id");

while($res = mysql_fetch_array($result))
{
	$name = $res['name'];
	$username = $res['username'];
	$password = $res['password'];
	$position = $res['position'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value=<?php echo $name;?>></td>
			</tr>
			<tr> 
				<td>Username</td>
				<td><input type="text" name="username" value=<?php echo $username;?>></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="text" name="password" value=<?php echo $password;?>></td>
			</tr>
			<tr> 
				<td>Position</td>
				<td><input type="text" name="position" value=<?php echo $position;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
