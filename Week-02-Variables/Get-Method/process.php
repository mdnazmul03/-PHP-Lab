<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>
</head>

<body>

<?php

// Receive data using GET
$student_id = $_GET["student_id"];
$name = $_GET["name"];
$email = $_GET["email"];
$password = $_GET["password"];
$gender = $_GET["gender"];
$department = $_GET["department"];
$address = $_GET["address"];

?>

<h2>Student Registration Successful</h2>

<p>
    <strong>Student ID:</strong>
    <?php echo $student_id; ?>
</p>

<p>
    <strong>Name:</strong>
    <?php echo $name; ?>
</p>

<p>
    <strong>Email:</strong>
    <?php echo $email; ?>
</p>

<p>
    <strong>Gender:</strong>
    <?php echo $gender; ?>
</p>

<p>
    <strong>Department:</strong>
    <?php echo $department; ?>
</p>

<p>
    <strong>Address:</strong>
    <?php echo $address; ?>
</p>

</body>
</html>