document.getElementById("registrationForm").addEventListener("submit", function(event) {

    let valid = true;

    // Get values
    let studentId = document.getElementById("student_id").value.trim();
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value;
    let department = document.getElementById("department").value;
    let address = document.getElementById("address").value.trim();

    // Clear previous messages
    document.getElementById("idError").innerHTML = "";
    document.getElementById("nameError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
    document.getElementById("genderError").innerHTML = "";
    document.getElementById("departmentError").innerHTML = "";
    document.getElementById("addressError").innerHTML = "";

    // Student ID validation
    if (studentId === "") {
        document.getElementById("idError").innerHTML =
            "Student ID is required.";
        valid = false;
    }

    // Name validation
    if (name === "") {
        document.getElementById("nameError").innerHTML =
            "Name is required.";
        valid = false;
    }

    // Email validation
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (email === "") {
        document.getElementById("emailError").innerHTML =
            "Email is required.";
        valid = false;
    }
    else if (!emailPattern.test(email)) {
        document.getElementById("emailError").innerHTML =
            "Enter a valid email address.";
        valid = false;
    }

    // Password validation
    if (password.length < 6) {
        document.getElementById("passwordError").innerHTML =
            "Password must contain at least 6 characters.";
        valid = false;
    }

    // Gender validation
    let gender = document.querySelector(
        'input[name="gender"]:checked'
    );

    if (!gender) {
        document.getElementById("genderError").innerHTML =
            "Please select your gender.";
        valid = false;
    }

    // Department validation
    if (department === "") {
        document.getElementById("departmentError").innerHTML =
            "Please select a department.";
        valid = false;
    }

    // Address validation
    if (address === "") {
        document.getElementById("addressError").innerHTML =
            "Address is required.";
        valid = false;
    }

    // Stop form submission if validation fails
    if (!valid) {
        event.preventDefault();
    }

});