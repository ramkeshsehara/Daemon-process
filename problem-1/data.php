<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "credanceinfotech";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user=$_POST['username'];
$password=$_POST['password'];

$query = mysqli_query($conn,"SELECT * FROM login WHERE username='$user'");
$count = mysqli_num_rows($query);
if ($count>0) {
echo 'Sorry! This Username already exists!';
}
else{

$sql="INSERT INTO login(username,password,login_time,logout_time,browser,operating_system)
VALUES('$user','$password','','','','')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully \n \n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
<br>
<br>
<a href="index.php">Home</a>
<!-- header('Location: index.php'); -->
<?php
$conn->close();

?>