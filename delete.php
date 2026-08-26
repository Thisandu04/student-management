<?php
// ============================================
// DELETE.PHP - Delete a student (DELETE)
// This runs when the "Delete" link is clicked
// from the index.php table.
// ============================================

include 'config/db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

// Go back to the homepage after deleting
header("Location: index.php");
exit();
?>
