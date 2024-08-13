<?php

$conn = mysqli_connect("localhost", "root", "", "registration_db");
if ($conn == false) {
    die("Connection failed: " . $con_connect_error());
}
