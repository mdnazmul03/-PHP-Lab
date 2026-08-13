<?php


$errors = [];
$data = [
    "applicant_id"  => "",
    "full_name"     => "",
    "email"         => "",
    "phone"         => "",
    "password"      => "",
    "gender"        => "",
    "job_position"  => "",
    "qualification" => "",
    "address"       => ""
];
$uploaded_cv_name = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    
    $data["applicant_id"]  = trim($_POST["applicant_id"] ?? "");
    $data["full_name"]     = trim($_POST["full_name"] ?? "");
    $data["email"]         = trim($_POST["email"] ?? "");
    $data["phone"]         = trim($_POST["phone"] ?? "");
    $data["password"]      = trim($_POST["password"] ?? "");
    $data["gender"]        = trim($_POST["gender"] ?? "");
    $data["job_position"]  = trim($_POST["job_position"] ?? "");
    $data["qualification"] = trim($_POST["qualification"] ?? "");
    $data["address"]       = trim($_POST["address"] ?? "");

    
    if (empty($data["applicant_id"])) {
        $errors[] = "Applicant ID is required.";
    }

    if (empty($data["full_name"])) {
        $errors[] = "Name is required.";
    }

    if (empty($data["email"])) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (empty($data["phone"])) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match('/^[0-9]{11}$/', $data["phone"])) {
        $errors[] = "Phone number must contain exactly 11 digits.";
    }

    if (empty($data["password"])) {
        $errors[] = "Password is required.";
    } elseif (strlen($data["password"]) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    if (empty($data["gender"])) {
        $errors[] = "Please select your gender.";
    }

    if (empty($data["job_position"])) {
        $errors[] = "Please select a job position.";
    }

    if (empty($data["qualification"])) {
        $errors[] = "Qualification is required.";
    }

    if (empty($data["address"])) {
        $errors[] = "Address is required.";
    }

    
    $allowed_ext  = ["pdf", "doc", "docx"];
    $max_size     = 2 * 1024 * 1024; // 2 MB
    $upload_dir   = __DIR__ . "/uploads/";

    if (!isset($_FILES["cv"]) || $_FILES["cv"]["error"] === UPLOAD_ERR_NO_FILE) {
        $errors[] = "Please upload your CV.";
    } elseif ($_FILES["cv"]["error"] !== UPLOAD_ERR_OK) {
        $errors[] = "An error occurred while uploading the CV.";
    } else {
        $file_name = $_FILES["cv"]["name"];
        $file_tmp  = $_FILES["cv"]["tmp_name"];
        $file_size = $_FILES["cv"]["size"];
        $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (!in_array($file_ext, $allowed_ext)) {
            $errors[] = "Invalid file type. Only PDF, DOC, and DOCX files are allowed.";
        } elseif ($file_size > $max_size) {
            $errors[] = "File size must not exceed 2 MB.";
        } else {
            
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            
            $safe_applicant_id = preg_replace('/[^A-Za-z0-9_-]/', '', $data["applicant_id"]);
            $uploaded_cv_name  = $safe_applicant_id . "_" . time() . "." . $file_ext;
            $target_path       = $upload_dir . $uploaded_cv_name;

            if (!move_uploaded_file($file_tmp, $target_path)) {
                $errors[] = "Failed to move uploaded file. Please try again.";
                $uploaded_cv_name = "";
            }
        }
    }

    
    if (!empty($errors)) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Application Failed</title>
            <style>
                body { font-family: Arial, sans-serif; background:#f4f6f8; padding:20px; }
                .box { max-width:600px; margin:0 auto; background:#fff; padding:25px 30px;
                       border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.15); }
                h2 { color:#c0392b; }
                ul { color:#c0392b; }
                a { display:inline-block; margin-top:15px; color:#2c7be5; text-decoration:none; }
            </style>
        </head>
        <body>
            <div class="box">
                <h2>Application Failed!</h2>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="index.php">&laquo; Back to Application Form</a>
            </div>
        </body>
        </html>
        <?php
        exit;
    } else {
        
        $query = http_build_query([
            "applicant_id" => $data["applicant_id"],
            "name"         => $data["full_name"],
            "cv"           => $uploaded_cv_name,
            "email"        => $data["email"],
            "phone"        => $data["phone"],
            "gender"       => $data["gender"],
            "job_position" => $data["job_position"],
            "qualification"=> $data["qualification"],
            "address"      => $data["address"]
        ]);

        header("Location: result.php?" . $query);
        exit;
    }

} else {
    
    header("Location: index.php");
    exit;
}