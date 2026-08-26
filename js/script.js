// ============================================
// SCRIPT.JS
// This handles small interactive touches:
// 1. Confirm before deleting a student
// 2. Validate the form before it submits
// (PHP validates too - JS is just for a nicer,
//  instant experience for the user)
// ============================================

// Runs when the "Delete" link is clicked
function confirmDelete() {
    return confirm("Are you sure you want to delete this student? This cannot be undone.");
}

// Runs when the Add/Edit form is submitted
function validateForm() {
    const name = document.getElementById("name").value.trim();
    const studentId = document.getElementById("student_id").value.trim();

    if (name === "" || studentId === "") {
        alert("Name and Student ID cannot be empty.");
        return false; // stops the form from submitting
    }

    if (name.length < 2) {
        alert("Name must be at least 2 characters.");
        return false;
    }

    return true; // allow form to submit
}
