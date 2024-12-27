<?php
include('db.php');

$sessions = ['2021-22', '2022-23', '2023-24'];  // Sessions to select from
$semesters = ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5', 'Semester 6', 'Semester 7', 'Semester 8'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $roll_number = $_POST['roll_number'];
    $name = $_POST['name'];
    $session = $_POST['session'];

    $semester_results = [];
    for ($i = 1; $i <= 8; $i++) {
        $result_key = 'semester' . $i . '_result';
        $semester_results[$result_key] = $_POST[$result_key];
    }

    // Update or insert result into the database
    $query = "SELECT * FROM students WHERE roll_number = '$roll_number' AND session = '$session'";
    $res = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($res) > 0) {
        // Update existing student results
        $update_query = "UPDATE students SET 
            semester1_result = '{$semester_results['semester1_result']}',
            semester2_result = '{$semester_results['semester2_result']}',
            semester3_result = '{$semester_results['semester3_result']}',
            semester4_result = '{$semester_results['semester4_result']}',
            semester5_result = '{$semester_results['semester5_result']}',
            semester6_result = '{$semester_results['semester6_result']}',
            semester7_result = '{$semester_results['semester7_result']}',
            semester8_result = '{$semester_results['semester8_result']}'
            WHERE roll_number = '$roll_number' AND session = '$session'";

        if (mysqli_query($conn, $update_query)) {
            $message = '<script> 

                Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Successfully Result Updated",
                showConfirmButton: false,
                timer: 2500
                });
            </script>';
        } else {
            $message = "Error updating results: " . mysqli_error($conn);
        }
    } else {


  

        // Insert new student results
        $insert_query = "INSERT INTO students (roll_number, name, session, 
            semester1_result, semester2_result, semester3_result, semester4_result,
            semester5_result, semester6_result, semester7_result, semester8_result)
            VALUES ('$roll_number', '$name', '$session', 
            '{$semester_results['semester1_result']}', 
            '{$semester_results['semester2_result']}', 
            '{$semester_results['semester3_result']}', 
            '{$semester_results['semester4_result']}',
            '{$semester_results['semester5_result']}', 
            '{$semester_results['semester6_result']}',
            '{$semester_results['semester7_result']}',
             '{$semester_results['semester8_result']}')";

        if (mysqli_query($conn, $insert_query)) {
            $message = '<script> 
                Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Reselt Insert to D.M Successfully",
                showConfirmButton: false,
                timer: 2500
                });
            </script>';
        } else {
            $message = "Error adding results: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit NPI Student Results</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <!-- <script src="sweetalert2/dist/sweetalert2.min.js"></script> -->
</head>
<body>
    <div class="container">
        <h2>Submit Student Results</h2>
        <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
        <form action="" method="POST">
            <label for="roll_number">Roll Number:</label>
            <input type="text" name="roll_number" required>

            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="session">Session:</label>
            <select name="session" required>
                <?php foreach ($sessions as $session_option): ?>
                    <option value="<?php echo $session_option; ?>"><?php echo $session_option; ?></option>
                <?php endforeach; ?>
            </select>

            <!-- Submit results for each semester -->
            <?php foreach ($semesters as $index => $semester): ?>
                <label for="semester<?php echo $index + 1; ?>_result"><?php echo $semester; ?> Result:</label>
                <select name="semester<?php echo $index + 1; ?>_result">
                    <option value="A">Select</option>
                    <option value="A">A</option>
                    <option value="A+">A+</option>
                    <option value="B">B</option>
                    <option value="B+">B+</option>
                    <option value="C">C</option>
                    <option value="F">F</option>
                    <option value="Null">Exam not yet</option>
                </select>
            <?php endforeach; ?>

            <button type="submit">Submit Results</button>
        </form>

        
    </div>
</body>
</html>
