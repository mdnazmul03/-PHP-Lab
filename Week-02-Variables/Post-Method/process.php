<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>
</head>

<body>

<?php

// Receive data using POST
$student_id = $_POST["student_id"];
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$gender = $_POST["gender"];
$department = $_POST["department"];
$address = $_POST["address"];

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