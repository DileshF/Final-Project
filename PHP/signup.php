<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SPICECO";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = isset($_POST['email']) ? $conn->real_escape_string(trim($_POST['email'])) : null;
$fname = isset($_POST['fname']) ? $conn->real_escape_string(trim($_POST['fname'])) : null;
$lname = isset($_POST['lname']) ? $conn->real_escape_string(trim($_POST['lname'])) : null;
$uname = isset($_POST['uname']) ? $conn->real_escape_string(trim($_POST['uname'])) : null;
$nic = isset($_POST['nic']) ? $conn->real_escape_string(trim($_POST['nic'])) : null;
$telNo = isset($_POST['telNo']) ? $conn->real_escape_string(trim($_POST['telNo'])) : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$rt_password = isset($_POST['rt_password']) ? $_POST['rt_password'] : null;
if (!$email || !$nic || !$rt_password) {
    die("Required fields are missing.");
}
$pass_hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users_table (Email, F_Name, L_Name, U_Name, NIC, Tel_No, Password) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $email, $fname, $lname, $uname, $nic, $telNo, $pass_hash);
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();