<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_name = $_POST['user_name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];

        $password_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);


        $first_name = $conn->real_escape_string($first_name);
        $last_name = $conn->real_escape_string($last_name);
        $user_name = $conn->real_escape_string($user_name);
        $mobile = $conn->real_escape_string($mobile);
        $email = $conn->real_escape_string($email);


        $query = "INSERT INTO users (first_name, last_name, user_name, mobile, email, password)
                  VALUES ('$first_name', '$last_name', '$user_name', '$mobile', '$email', '$password_hashed')";

        if ($conn->query($query) === TRUE) {
            echo "<script>
                    alert('Successfully Registered..!');
                    window.location.href = 'http://localhost/muthu/login.html';
                  </script>";
        } else {
            echo "<script>
                    alert('Something went wrong..!');
                    window.location.href = 'http://localhost/muthu/login.html';
                  </script>";
        }
    } else {
        echo "<script>
                alert('User already exists with the given email and password..!');
                window.location.href = 'http://localhost/muthu/login.html';
              </script>";
    }
}
