<?php

$applicant_id = $_GET["applicant_id"] ?? "";
$name         = $_GET["name"] ?? "";
$cv           = $_GET["cv"] ?? "";


$email         = $_REQUEST["email"] ?? "";
$phone         = $_REQUEST["phone"] ?? "";
$gender        = $_REQUEST["gender"] ?? "";
$job_position  = $_REQUEST["job_position"] ?? "";
$qualification = $_REQUEST["qualification"] ?? "";
$address       = $_REQUEST["address"] ?? "";

if (empty($applicant_id) || empty($name)) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Application Successful</title>
</head>
<body>
<div class="box">
<div class="header">=================================
 APPLICATION SUCCESSFUL
=================================</div>

<table>
    <tr><td class="label">Applicant ID:</td><td><?php echo htmlspecialchars($applicant_id); ?></td></tr>
    <tr><td class="label">Name:</td><td><?php echo htmlspecialchars($name); ?></td></tr>
    <tr><td class="label">Email:</td><td><?php echo htmlspecialchars($email); ?></td></tr>
    <tr><td class="label">Phone:</td><td><?php echo htmlspecialchars($phone); ?></td></tr>
    <tr><td class="label">Gender:</td><td><?php echo htmlspecialchars($gender); ?></td></tr>
    <tr><td class="label">Job Position:</td><td><?php echo htmlspecialchars($job_position); ?></td></tr>
    <tr><td class="label">Qualification:</td><td><?php echo htmlspecialchars($qualification); ?></td></tr>
    <tr><td class="label">Address:</td><td><?php echo htmlspecialchars($address); ?></td></tr>
    <tr><td class="label">Uploaded CV:</td><td><?php echo htmlspecialchars($cv); ?></td></tr>
</table>

<div class="footer">Application submitted successfully.</div>

<a href="index.php">&laquo; Submit Another Application</a>
</div>
</body>
</html>