<?php
session_start();

$total = 0;

for ($i = 0; $i < 4; $i++) {
    if (!empty($_POST["dev$i"])) {
        $total += (int)$_POST["dev$i"];
    }

    if (!empty($_POST["acc$i"])) {
        $total += (int)$_POST["acc$i"];
    }
}

$judge = $_POST['judge_name'];
$group = $_POST['group_number'];
$title = $_POST['project_title'];
$members = $_POST['members'];
$comments = $_POST['comments'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Submission Receipt</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

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
<td><b>Group Members:</b></td>
<td><?php echo $members; ?></td>
</tr>

<tr>
<td><b>Comments:</b></td>
<td><?php echo $comments; ?></td>
</tr>

<tr>
<td><b>Total Score:</b></td>
<td><b><?php echo $total; ?> / 60</b></td>
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
