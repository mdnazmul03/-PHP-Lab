<?php
 
error_reporting(E_ALL);
ini_set('display_errors', 1);
 
$errors = [];
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $applicant_id = trim($_POST["applicant_id"] ?? "");
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $password = $_POST["password"] ?? "";
    $gender = $_POST["gender"] ?? "";
    $job_position = $_POST["job_position"] ?? "";
    $qualification = trim($_POST["qualification"] ?? "");
    $address = trim($_POST["address"] ?? "");
 
    if ($applicant_id == "") {
        $errors[] = "Applicant ID is required.";
    }
 
    if ($name == "") {
        $errors[] = "Name is required.";
    }
 
    if ($email == "") {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }
 
    if ($phone == "") {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match("/^[0-9]{11}$/", $phone)) {
        $errors[] = "Phone number must contain exactly 11 digits.";
    }
 
    if ($password == "") {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must contain at least 6 characters.";
    }
 
    if ($gender == "") {
        $errors[] = "Please select your gender.";
    }
 
    if ($job_position == "") {
        $errors[] = "Please select a job position.";
    }
 
    if ($qualification == "") {
        $errors[] = "Qualification is required.";
    }
 
    if ($address == "") {
        $errors[] = "Address is required.";
    }
 
    if (!isset($_FILES["cv"]) || $_FILES["cv"]["error"] == UPLOAD_ERR_NO_FILE) {
 
        $errors[] = "Please upload your CV.";
 
    } elseif ($_FILES["cv"]["error"] != UPLOAD_ERR_OK) {
 
        $errors[] = "There was an error uploading your CV.";
 
    } else {
 
        $file_name = $_FILES["cv"]["name"];
        $file_size = $_FILES["cv"]["size"];
        $file_tmp = $_FILES["cv"]["tmp_name"];
 
        $file_extension = strtolower(
            pathinfo($file_name, PATHINFO_EXTENSION)
        );
 
        $allowed_extensions = ["pdf", "doc", "docx"];
 
        if (!in_array($file_extension, $allowed_extensions)) {
            $errors[] = "Only PDF, DOC and DOCX files are allowed.";
        }
 
        if ($file_size > 2 * 1024 * 1024) {
            $errors[] = "CV file size must not exceed 2 MB.";
        }
    }
 
    if (!empty($errors)) {
 
        echo "<h2>Application Failed!</h2>";
 
        foreach ($errors as $error) {
            echo "<p>" . htmlspecialchars($error) . "</p>";
        }
 
        echo '<a href="index.php">Go Back</a>';
 
        exit();
    }

 $upload_folder = __DIR__ . '/';

if (!is_dir($upload_folder)) {
    if (!@mkdir($upload_folder, 0755, true)) {
        die('Unable to create upload directory: ' . htmlspecialchars($upload_folder));
    }
}

$new_file_name = time() . "_" . basename($file_name);

$file_path = $upload_folder . $new_file_name;
 
    if (move_uploaded_file($file_tmp, $file_path)) {
 
        header(
            "Location: result.php?id=" .
            urlencode($applicant_id) .
            "&name=" .
            urlencode($name) .
            "&file=" .
            urlencode($new_file_name)
        );
 
        exit();
 
    } else {
 
        echo "Failed to upload CV.";
    }
}
 
?>




