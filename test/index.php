<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
<?php 
	echo '<p>Hello World</p>'; 
	$servername = "mariadb";
	$username = "root";
	$password = "rootpwd";
	$dbname = "TEST";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	    echo "Debugging errno: " . mysqli_connect_error() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	}
	echo "Connected successfully";

	$sql = "CREATE TABLE guests (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	reg_date TIMESTAMP
	)";
	if($conn->query($sql) === TRUE){
		echo "Table guests created successfully....Congratulations";
	}else{
		echo "Error creating table";
	}

	$sql = "INSERT INTO guests (firstname, lastname, email)
		VALUES ('Deepali', 'Rawool', 'deepali@example.com')";
	if($conn->query($sql) == TRUE){
		echo "Data inserted successfully";
	}else{
		echo "Error inserting data into table guests";
	}
	$sql = "SELECT id, firstname, lastname FROM guests";
	$result = $conn->query($sql);
	echo "Number of results : " . $result->num_rows;
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "id: " . $row["id"]. " -Name: " . $row["firstname"]. " " . $row["lastname"]; "<br>";
		}
	}else{
		echo "0 results";
	}

	#$stmt->close();

?> 
 </body>
</html>
