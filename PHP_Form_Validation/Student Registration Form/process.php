<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_id = $_POST["student_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $gender = $_POST["gender"] ?? "";
    $department = $_POST["department"];
    $address = $_POST["address"];

    if (empty($student_id)) {
        $errors[] = "Student ID is required.";
    }

    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must contain at least 6 characters.";
    }

    if (empty($gender)) {
        $errors[] = "Please select your gender.";
    }

    if (empty($department)) {
        $errors[] = "Please select your department.";
    }

    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    if (!isset($_FILES["document"]) || $_FILES["document"]["error"] != 0) {

        $errors[] = "Please upload a document.";

    } else {

        $file_name = $_FILES["document"]["name"];
        $file_size = $_FILES["document"]["size"];
        $file_tmp = $_FILES["document"]["tmp_name"];
        $file_type = $_FILES["document"]["type"];

        $allowed_types = [
            "application/pdf",
            "image/jpeg",
            "image/png"
        ];

        if (!in_array($file_type, $allowed_types)) {
            $errors[] = "Only PDF, JPG and PNG files are allowed.";
        }

        if ($file_size > 2 * 1024 * 1024) {
            $errors[] = "File size must be less than 2 MB.";
        }
    }

    if (count($errors) == 0) {

        $upload_folder = "uploads/";

        $new_file_name = time() . "_" . basename($file_name);

        $file_path = $upload_folder . $new_file_name;

        move_uploaded_file($file_tmp, $file_path);

        header(
            "Location: success.php?name=" .
            urlencode($name) .
            "&id=" .
            urlencode($student_id) .
            "&file=" .
            urlencode($new_file_name)
        );

        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>
</head>
<body>

<h2>Registration Result</h2>

<?php

if (count($errors) > 0) {

    echo "<h3>Registration Failed</h3>";

    foreach ($errors as $error) {

        echo "<p>$error</p>";

    }

    echo '<a href="index.php">Go Back</a>';

} else {

    echo "<p>Registration successful.</p>";

}

?>

</body>
</html>