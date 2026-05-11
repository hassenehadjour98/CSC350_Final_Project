<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['judge'])) {
    header("Location: index.html");
    exit();
}

include "db.php";

$total = 0;

for ($i = 0; $i < 4; $i++) {
    if (!empty($_POST["dev$i"])) {
        $total += (int)$_POST["dev$i"];
    }

    if (!empty($_POST["acc$i"])) {
        $total += (int)$_POST["acc$i"];
    }
}

$judge = $conn->real_escape_string($_POST['judge_name']);
$group = $conn->real_escape_string($_POST['group_number']);
$title = $conn->real_escape_string($_POST['project_title']);

$sql = "INSERT INTO grades (judge_name, group_number, project_title, total)
        VALUES ('$judge', '$group', '$title', '$total')";

if (!$conn->query($sql)) {
    die("SQL Error: " . $conn->error);
}

$result = $conn->query("SELECT ROUND(AVG(total), 2) AS avg_score 
                        FROM grades 
                        WHERE group_number = '$group'");

$row = $result->fetch_assoc();
$average = $row['avg_score'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submission Receipt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <div style="text-align:right; margin-bottom:10px;">
        Logged in as: <b><?php echo $_SESSION['judge']; ?></b>
        <a href="logout.php"><button type="button">Logout</button></a>
    </div>

    <div class="success-box">
        <h2>Grade Submitted Successfully!</h2>

        <table class="info-table">
            <tr>
                <td><b>Judge:</b></td>
                <td><?php echo $judge; ?></td>
            </tr>

            <tr>
                <td><b>Group Number:</b></td>
                <td><?php echo $group; ?></td>
            </tr>

            <tr>
                <td><b>Project Title:</b></td>
                <td><?php echo $title; ?></td>
            </tr>

            <tr>
                <td><b>Your Total Score:</b></td>
                <td><b><?php echo $total; ?> / 60</b></td>
            </tr>

            <tr>
                <td><b>Current Group Average:</b></td>
                <td><b><?php echo $average; ?></b></td>
            </tr>
        </table>

        <br>

        <div style="text-align:center;">
            <a href="judge.php"><button type="button">Grade Another Group</button></a>
        </div>
    </div>

</div>

</body>
</html>