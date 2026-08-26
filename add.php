<?php
include 'config/db.php';

$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $name       = trim($_POST['name']);
    $student_id = trim($_POST['student_id']);
    $email      = trim($_POST['email']);
    $course     = trim($_POST['course']);
    $grade      = trim($_POST['grade']);

    
    if (empty($name) || empty($student_id)) {
        $error = "Name and Student ID are required fields.";
    } else {
        
        $stmt = $conn->prepare("INSERT INTO students (name, student_id, email, course, grade) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $student_id, $email, $course, $grade);

        if ($stmt->execute()) {
            $echo = "Student added successfully!";
            header("Location: index.php");
            exit();
        } else {
            $error = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <h1>Add New Student</h1>

        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="add.php" method="POST" onsubmit="return validateForm()">
            <label>Name</label>
            <input type="text" name="name" id="name" required>

            <label>Student ID</label>
            <input type="text" name="student_id" id="student_id" required>

            <label>Email</label>
            <input type="email" name="email" id="email">

            <label>Course</label>
            <input type="text" name="course" id="course">

            <label>Grade</label>
            <input type="text" name="grade" id="grade">

            <button type="submit" class="btn btn-add">Save Student</button>
            <a href="index.php" class="btn">Cancel</a>
        </form>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
