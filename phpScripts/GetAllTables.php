<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Get Administration PHP</title>
</head>

<body>
<!--comment-->
<!--old stuff, ignore
<p>This file accesses the table named "Administration", with six fields: 
"adminID", "adminType", "emailAddress", "password", "firstName", "lastName"</p>

<p>There are three records of information<br/>
<table border="1">
	<tr><th>adminID</th><th>adminType</th><th>emailAddress</th><th>password</th><th>firstName</th></tr>
    <tr><td>1</td><td>fname1</td><td>lname1</td><td>1234567890</td><td>lname1@gmail.com</td></tr>
    <tr><td>2</td><td>fname2</td><td>lname2</td><td>2345678901</td><td>lname2@gmail.com</td></tr>
    <tr><td>3</td><td>fname3</td><td>lname3</td><td>3456789012</td><td>lname3@gmail.com</td></tr>
</table>
</p>
-->
</body>
</html>
<?php
echo "<h2>Get All Tables using PHP</h2>";
echo "<p>PHP version " . phpversion() . "</p>";

$dsn = 'mysql:host=mysql13.000webhost.com;dbname=a7033823_survey';
$username = 'a7033823_scott';
$password = 'pass12';
try {
	$db = new PDO($dsn, $username, $password);
	echo "<p>You are connected to the database.</p>";
}catch(PDOException $e){
	$error_message = $e->getMessage();
	echo "<p>An error occurred while connecting to the database:
	$error_message</p>";
}

$query = 'SELECT * FROM ADMINISTRATION';

$allPeople = $db->query($query);
echo"<p>Current state of the ADMINISTRATION table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>ADMIN_ID</th><th>ADMIN_TYPE</th><th>EMAIL_ADDRESS</th><th>PASSWORD</th><th>FIRST_NAME</th><th>LAST_NAME</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['ADMIN_ID']; ?></td>
    	<td><?php echo $aPerson['ADMIN_TYPE']; ?></td>
		<td><?php echo $aPerson['EMAIL_ADDRESS']; ?></td>
		<td><?php echo $aPerson['PASSWORD']; ?></td>
		<td><?php echo $aPerson['FIRST_NAME']; ?></td>
		<td><?php echo $aPerson['LAST_NAME']; ?></td>
    </tr>
<?php }; 
echo"</table>";

$query = 'SELECT * FROM COACH';

$allPeople = $db->query($query);
echo"<p>Current state of the COACH table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>ID</th><th>FIRST_NAME</th><th>LAST_NAME</th><th>PHONE</th><th>EMAIL</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['ID']; ?></td>
    	<td><?php echo $aPerson['FIRST_NAME']; ?></td>
		<td><?php echo $aPerson['LAST_NAME']; ?></td>
		<td><?php echo $aPerson['PHONE']; ?></td>
		<td><?php echo $aPerson['EMAIL']; ?></td>
    </tr>
<?php }; 
echo"</table>";

$query = 'SELECT * FROM GAME_SCHEDULE';

$allPeople = $db->query($query);
echo"<p>Current state of the GAME_SCHEDULE table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>ID</th><th>MEETING_DATE</th><th>MEETING_TIME</th><th>FIELD_ID</th><th>TEAM_ID</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['ID']; ?></td>
    	<td><?php echo $aPerson['MEETING_DATE']; ?></td>
		<td><?php echo $aPerson['MEETING_TIME']; ?></td>
		<td><?php echo $aPerson['FIELD_ID']; ?></td>
		<td><?php echo $aPerson['TEAM_ID']; ?></td>
    </tr>
<?php }; 
echo"</table>";

$query = 'SELECT * FROM LOCATION';

$allPeople = $db->query($query);
echo"<p>Current state of the LOCATION table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>ID</th><th>NAME</th><th>STREET</th><th>CITY</th><th>STATE</th><th>ZIP</th><th>MAP_LINK</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['ID']; ?></td>
    	<td><?php echo $aPerson['NAME']; ?></td>
		<td><?php echo $aPerson['STREET']; ?></td>
		<td><?php echo $aPerson['CITY']; ?></td>
		<td><?php echo $aPerson['STATE']; ?></td>
		<td><?php echo $aPerson['ZIP']; ?></td>
		<td><?php echo $aPerson['MAP_LINK']; ?></td>
    </tr>
<?php }; 
echo"</table>";

$query = 'SELECT * FROM PLAYER';

$allPeople = $db->query($query);
echo"<p>Current state of the PLAYER table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>ID</th><th>F_NAME</th><th>L_NAME</th><th>DOB</th><th>TELEPHONE</th><th>EMAIL</th><th>POSITION</th><th>TEAM_ID</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['ID']; ?></td>
    	<td><?php echo $aPerson['F_NAME']; ?></td>
		<td><?php echo $aPerson['L_NAME']; ?></td>
		<td><?php echo $aPerson['DOB']; ?></td>
		<td><?php echo $aPerson['TELEPHONE']; ?></td>
		<td><?php echo $aPerson['EMAIL']; ?></td>
		<td><?php echo $aPerson['POSITION']; ?></td>
		<td><?php echo $aPerson['TEAM_ID']; ?></td>
    </tr>
<?php }; 
echo"</table>";

$query = 'SELECT * FROM TEAM';

$allPeople = $db->query($query);
echo"<p>Current state of the TEAM table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>ID</th><th>TEAM_NAME</th><th>COACH_ID</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['ID']; ?></td>
    	<td><?php echo $aPerson['TEAM_NAME']; ?></td>
		<td><?php echo $aPerson['COACH_ID']; ?></td>
    </tr>
<?php }; 
echo"</table>";
?>