<?php
include 'conn.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_name = $_POST['user_name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, user_name, mobile, email, dob, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $first_name, $last_name, $user_name, $mobile, $email, $dob, $password);

if ($stmt->execute()) {
	echo "<script>
	alert('Successfully Registered..!');
	window.location.href = 'http://localhost/muthu';
	</script>";
} else {
	echo "<script>
	alert('Something went wrong..!');
	window.location.href = 'http://localhost/muthu/register.php';
	</script>";
}

$stmt->close();
$conn->close();
