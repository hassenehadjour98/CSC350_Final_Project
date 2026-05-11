<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    header("Location: index.html");
    exit();
}

include "db.php";

$result = $conn->query("SELECT group_number, project_title, COUNT(*) AS judges_submitted, ROUND(AVG(total), 2) AS average_score
                        FROM grades
                        GROUP BY group_number, project_title
                        ORDER BY group_number");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <div style="text-align:right; margin-bottom:10px;">
        Logged in as: <b>Admin</b>
        <a href="logout.php"><button type="button">Logout</button></a>
    </div>

    <h1>Admin - Group Averages</h1>

    <table class="admin-table">
        <tr>
            <th>Group Number</th>
            <th>Project Title</th>
            <th>Judges Submitted</th>
            <th>Average Grade</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['group_number']; ?></td>
            <td><?php echo $row['project_title']; ?></td>
            <td><?php echo $row['judges_submitted']; ?> / 4</td>
            <td><?php echo $row['average_score']; ?></td>
        </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>