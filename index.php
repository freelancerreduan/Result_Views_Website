<?php
include('db.php');

$sessions = ['2021-22', '2023-24', '2025-26', '2027-28', '2029-30'];  // Sessions to select from
$semesters = ['1 Semester', '2 Semester', '3 Semester', '4 Semester', '5 Semester', '6 Semester', '7 Semester', '8 Semester'];
$semester_results = [];

// Fetch student data if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $roll_number = $_POST['roll_number'];
    $session = $_POST['session'];

    // Fetch student results based on roll number and session
    $query = "SELECT * FROM students WHERE roll_number = '$roll_number' AND session = '$session'";
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows(result: $res) > 0) {
        $semester_results = mysqli_fetch_assoc($res);
    } else {
        $semester_results = "No result found for the given roll number and session.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result Viewer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>NPI Student Result Search</h2>
        <form action="" method="POST">
            <label for="roll_number">Roll Number:</label>
            <input type="text" id="roll_number" name="roll_number" required>

            <label for="session">Session:</label>
            <select name="session" id="session" required>
                <?php foreach ($sessions as $session_option): ?>
                    <option value="<?php echo $session_option; ?>" <?php echo (isset($session) && $session == $session_option) ? 'selected' : ''; ?>>
                        <?php echo $session_option; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Search Results</button>
        </form>

        <?php if (is_array($semester_results)): ?>
            <h3>Student Results:</h3>
            <p> <b> Name:</b> <?php  if(isset($semester_results['name'])){ echo $semester_results['name']; } ?></p>
            <p> <b>Roll_Number: </b>   <?php  if(isset($semester_results['roll_number'])){ echo $semester_results['roll_number']; } ?></p>

            <p> <b>Session: </b>  <?php  if(isset($semester_results['session'])){ echo $semester_results['session']; } ?></p>

            <!-- Display results for each semester -->
            <?php foreach ($semesters as $index => $semester): ?>
                <p><?php echo $semester; ?>: 
                    <?php 
                        $semester_key = 'semester' . ($index + 1) . '_result'; 
                        echo isset($semester_results[$semester_key]) && $semester_results[$semester_key] ? $semester_results[$semester_key] : "No Result Available"; 
                    ?>
                </p>
            <?php endforeach; ?>
        <?php elseif ($semester_results): ?>
            <p><?php echo $semester_results; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
