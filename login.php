<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$judges = [
    "mwilson"  => ["pass" => "Falcon7", "name" => "Ms. Margaret Wilson"],
    "jthomas"  => ["pass" => "Cedar42", "name" => "Mr. James Thomas"],
    "lramirez" => ["pass" => "Stone88", "name" => "Ms. Laura Ramirez"],
    "dchang"   => ["pass" => "River5", "name" => "Dr. David Chang"]
];

if ($username == "admin" && $password == "Admin2025") {
    $_SESSION['role'] = "admin";
    header("Location: admin.php");
    exit();
}

if (isset($judges[$username]) && $judges[$username]['pass'] == $password) {
    $_SESSION['judge'] = $judges[$username]['name'];
    header("Location: judge.php");
    exit();
}

echo "<h2 style='text-align:center;'>Wrong Username or Password</h2>";
?>