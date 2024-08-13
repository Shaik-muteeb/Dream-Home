<?php include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT  * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        echo "Login Successful";
        echo "
        <script>
        alert('Login Successful');
        window.location.href = 'http://localhost/muthu/home2.html';
        </script>";
    } else {
        echo "
        <script>
        alert('Login Successful');
        window.location.href = 'http://localhost/muthu/home2.html';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="signup.css" />

    <title>Login</title>

</head>

<body>

    <form method="POST" action="login.php">
        <div class="card">
            <div class="form">
                <h3>Login</h3>
                <div class="input-field">
                    <i class="fa fa-envelope"></i>
                    <input type="text" name="email" placeholder="Enter your Email" required />
                </div>
                <div class="input-field">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password" placeholder="Enter your password" required />
                </div>

                <button>Login</button>
                <p>
                    Don't have an account?
                    <a href="signup.html"> Sign up</a>
                </p>
            </div>
        </div>
    </form>
</body>

</html>