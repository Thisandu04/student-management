<?php

include 'config/db.php';

// Fetch all students from the database, newest first
$sql = "SELECT * FROM students ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <h1>Student Management System</h1>

        <a href="add.php" class="btn btn-add">+ Add New Student</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Grade</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['student_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['course']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['grade']) . "</td>";
                        echo "<td>
                                <a href='edit.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                                <a href='delete.php?id=" . $row['id'] . "' class='btn btn-delete' onclick=\"return confirmDelete()\">Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No students found. Add one!</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
<?php $conn->close(); ?>
