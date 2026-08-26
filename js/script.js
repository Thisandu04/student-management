function confirmDelete() {
    return confirm("Are you sure you want to delete this student? This cannot be undone.");
}


function validateForm() {
    const name = document.getElementById("name").value.trim();
    const studentId = document.getElementById("student_id").value.trim();

    if (name === "" || studentId === "") {
        alert("Name and Student ID cannot be empty...!");
        return false; 
    }

    if (name.length < 2) {
        alert("Name must be at least 2 characters...!");
        return false;
    }

    return true; 
}
