<?php
 
/* Receive data using $_GET */
 
$applicant_id = $_GET["id"] ?? "";
$name = $_GET["name"] ?? "";
$file = $_GET["file"] ?? "";
 
 
/* Receive data using $_REQUEST */
 
$request_id = $_REQUEST["id"] ?? "";
$request_name = $_REQUEST["name"] ?? "";
 
?>
 
<!DOCTYPE html>
<html>
 
<head>
    <title>Application Successful</title>
</head>
 
<body>
 
<h2>=================================</h2>
 
<h2>APPLICATION SUCCESSFUL</h2>
 
<h2>=================================</h2>
 
<p>
    Applicant ID:
    <?php echo htmlspecialchars($applicant_id); ?>
</p>
 
<p>
    Name:
    <?php echo htmlspecialchars($name); ?>
</p>
 
<p>
    Uploaded CV:
    <?php echo htmlspecialchars($file); ?>
</p>
 
<p>
    Request ID:
    <?php echo htmlspecialchars($request_id); ?>
</p>
 
<p>
    Request Name:
    <?php echo htmlspecialchars($request_name); ?>
</p>
 
<p>
    Application submitted successfully.
</p>
 
</body>
 
</html>
 