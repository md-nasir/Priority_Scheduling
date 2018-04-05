<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <title>Priority algorithm</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="wraper">
    <div>
        <fieldset>
            <legend>Priority CPU scheduling algorithm</legend>
            <p>Let arrival times are 0</p>
            <p>And enter another process events , burst time ,priority and they separated by comma(,)</p>
            <p>Ex: P1,P2,P3 and Burst time 10,5,20 and Priority 2,1,3 </p>
            <?php if (isset($_SESSION['a_w_time'])) {
                echo "<h3>Average waiting time: " . $_SESSION['a_w_time'] . "</h3>";
                unset($_SESSION['a_w_time']);
            } elseif (isset($_SESSION['error'])) {
                echo "<h3>" . $_SESSION['error'] . "</h3>";
                unset($_SESSION['error']);
            }
            ?>
            </h3>
            <form action="action.php" method="POST">
                <table>
                    <tr>
                        <td><label>Process Events</label></td>
                        <td><input type="text" placeholder="P1,P2,P3...." name="process_events"></td>
                    </tr>
                    <tr>
                        <td><label>Burst Time</label></td>
                        <td><input type="text" placeholder="10,20,5....." name="burst_time"></td>
                    </tr>
                    <tr>
                        <td><label>Priority</label></td>
                        <td><input type="text" placeholder="2,1,3....." name="priority"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="GetAvg." name="subbmit"></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </div>
</div>
</body>
</html>