<?php
//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.
$host = 'db';

// Database use name
$user = 'monta';

//database user password
$pass = '123';

// database name
$mydb = 'DB1';

// check the MySQL connection status
$conn = new mysqli($host, $user, $pass, $mydb);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL server successfully!";
}
echo "<br>";
$sql = 'SELECT * FROM students';

if ($result = $conn->query($sql)) {
    while ($data = $result->fetch_object()) {
        $students[] = $data;
    }
}

foreach ($students as $student) {
    echo "<br>";
    echo $student->fname . "   " . $student->lname;
    echo "<br>";
}
?>