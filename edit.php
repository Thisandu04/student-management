<?php

include 'config/db.php';

$error = "";


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id === 0) {
    header("Location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name       = trim($_POST['name']);
    $student_id = trim($_POST['student_id']);
    $email      = trim($_POST['email']);
    $course     = trim($_POST['course']);
    $grade      = trim($_POST['grade']);

    if (empty($name) || empty($student_id)) {
        $error = "Name and Student ID are required.";
    } else {
        $stmt = $conn->prepare("UPDATE students SET name=?, student_id=?, email=?, course=?, grade=? WHERE id=?");
        $stmt->bind_param("sssssi", $name, $student_id, $email, $course, $grade, $id);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            $error = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}


$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
$stmt->close();


if (!$student) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <h1>Edit Student</h1>

        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="edit.php?id=<?php echo $student['id']; ?>" method="POST" onsubmit="return validateForm()">
            <label>Name</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($student['name']); ?>" required>

            <label>Student ID</label>
            <input type="text" name="student_id" id="student_id" value="<?php echo htmlspecialchars($student['student_id']); ?>" required>

            <label>Email</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($student['email']); ?>">

            <label>Course</label>
            <input type="text" name="course" id="course" value="<?php echo htmlspecialchars($student['course']); ?>">

            <label>Grade</label>
            <input type="text" name="grade" id="grade" value="<?php echo htmlspecialchars($student['grade']); ?>">

            <button type="submit" class="btn btn-add">Update Student</button>
            <a href="index.php" class="btn">Cancel</a>
        </form>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
<?php $conn->close(); ?>
