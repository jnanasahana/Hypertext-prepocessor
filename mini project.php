<!DOCTYPE html>
<html>
<head>
    <title>Timetable Generator</title>
</head>
<body>

<h2>Timetable Generator</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="days">Enter the number of days in the timetable:</label>
    <input type="number" name="days" id="days" min="1" required><br><br>

    <label for="periods">Enter the number of periods per day:</label>
    <input type="number" name="periods" id="periods" min="1" required><br><br>

    <button type="submit" name="submit">Generate Timetable</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $days = $_POST['days'];
    $periods = $_POST['periods'];

    // Display timetable form
    echo "<h3>Timetable</h3>";
    echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>";
    echo "<table border='1'>";
    echo "<tr><th>Day/Period</th>";

    // Generate table headers for periods
    for ($p = 1; $p <= $periods; $p++) {
        echo "<th>Period $p</th>";
    }
    echo "</tr>";

    // Generate rows for each day
    for ($d = 1; $d <= $days; $d++) {
        echo "<tr>";
        echo "<td>Day $d</td>";

        // Generate input fields for each period
        for ($p = 1; $p <= $periods; $p++) {
            echo "<td><input type='text' name='subject[$d][$p]'></td>";
        }
        echo "</tr>";
    }
    echo "</table><br>";
    echo "<button type='submit' name='save'>Save Timetable</button>";
    echo "</form>";
}   ````````````

// Display saved timetable
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    $subjects = $_POST['subject'];

    echo "<h3>Saved Timetable</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Day/Period</th>";

    // Generate table headers for periods
    for ($p = 1; $p <= $periods; $p++) {
        echo "<th>Period $p</th>";
    }
    echo "</tr>";

    // Display saved subjects
    foreach ($subjects as $day => $periods) {
        echo "<tr>";
        echo "<td>Day $day</td>";
        foreach ($periods as $subject) {
            echo "<td>$subject</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>

</body>                                                                                                                                                                                                                                                                         
</html>
