<?php
session_start();

if (!isset($_SESSION['judge'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Grading Form</title>

    <link rel="stylesheet" href="style.css">

    <script src="script.js"></script>

</head>

<body>

<div class="container">

    <!-- LOGOUT MOVED OUTSIDE -->
    <div style="text-align:right; margin-bottom:10px;">

        Logged in as:
        <b><?php echo $_SESSION['judge']; ?></b>

        <a href="logout.php">
            <button type="button">Logout</button>
        </a>

    </div>

    <form action="submit.php" method="POST">

        <table class="rubric">

            <tr class="title-row">
                <td colspan="3">
                    <b>Computer Science Project</b>
                </td>
            </tr>

            <tr class="info-row">

                <td colspan="2">

                    <b>Group Members:</b>

                    <input type="text"
                           name="members"
                           class="grey-input">

                </td>

                <td>

                    <b>Group Number:</b>

                    <br><br>

                    <input type="text"
                           name="group_number"
                           class="short-input"
                           required>

                </td>

            </tr>

            <tr class="info-row">

                <td colspan="3">

                    <b>Project Title:</b>

                    <input type="text"
                           name="project_title"
                           class="wide-input">

                </td>

            </tr>

            <tr class="header-row">

                <th>Criteria</th>

                <th>Developing (0-10)</th>

                <th>Accomplished (11-15)</th>

            </tr>

            <tr class="criteria-row">

                <td>
                    <b>Articulate requirements</b>
                </td>

                <td>
                    <input type="number"
                           name="dev0"
                           id="dev0"
                           min="0"
                           max="10"
                           class="score-input"
                           oninput="disableOther(this,'acc0')">
                </td>

                <td>
                    <input type="number"
                           name="acc0"
                           id="acc0"
                           min="11"
                           max="15"
                           class="score-input"
                           oninput="disableOther(this,'dev0')">
                </td>

            </tr>

            <tr class="criteria-row">

                <td>
                    <b>Choose appropriate tools and methods for each task</b>
                </td>

                <td>
                    <input type="number"
                           name="dev1"
                           id="dev1"
                           min="0"
                           max="10"
                           class="score-input"
                           oninput="disableOther(this,'acc1')">
                </td>

                <td>
                    <input type="number"
                           name="acc1"
                           id="acc1"
                           min="11"
                           max="15"
                           class="score-input"
                           oninput="disableOther(this,'dev1')">
                </td>

            </tr>

            <tr class="criteria-row">

                <td>
                    <b>Give clear and coherent oral presentation</b>
                </td>

                <td>
                    <input type="number"
                           name="dev2"
                           id="dev2"
                           min="0"
                           max="10"
                           class="score-input"
                           oninput="disableOther(this,'acc2')">
                </td>

                <td>
                    <input type="number"
                           name="acc2"
                           id="acc2"
                           min="11"
                           max="15"
                           class="score-input"
                           oninput="disableOther(this,'dev2')">
                </td>

            </tr>

            <tr class="criteria-row">

                <td>
                    <b>Functioned well as a team</b>
                </td>

                <td>
                    <input type="number"
                           name="dev3"
                           id="dev3"
                           min="0"
                           max="10"
                           class="score-input"
                           oninput="disableOther(this,'acc3')">
                </td>

                <td>
                    <input type="number"
                           name="acc3"
                           id="acc3"
                           min="11"
                           max="15"
                           class="score-input"
                           oninput="disableOther(this,'dev3')">
                </td>

            </tr>

            <tr class="total-row">

                <td colspan="2" style="text-align:center;">

                    <b>Total:</b>

                    <span id="total-display">0</span>

                </td>

                <td></td>

            </tr>

            <tr class="info-row">

                <td colspan="3">

                    <b>Judge's Name:</b>

                    <br><br>

                    <input type="text"
                           name="judge_name"
                           value="<?php echo $_SESSION['judge']; ?>"
                           class="grey-input">

                </td>

            </tr>

            <tr class="info-row">

                <td colspan="3">

                    <b>Comments:</b>

                    <br><br>

                    <input type="text"
                           name="comments"
                           class="grey-input">

                </td>

            </tr>

        </table>

        <br>

        <div style="text-align:center;">
            <button type="submit">Submit</button>
        </div>

    </form>

</div>

</body>
</html>