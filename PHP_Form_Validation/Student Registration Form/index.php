<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>

<h2>Student Registration Form</h2>

<form action="process.php" method="POST" enctype="multipart/form-data">

    <label>Student ID:</label>
    <input type="text" name="student_id">
    <br><br>

    <label>Name:</label>
    <input type="text" name="name">
    <br><br>

    <label>Email:</label>
    <input type="text" name="email">
    <br><br>

    <label>Password:</label>
    <input type="password" name="password">
    <br><br>

    <label>Gender:</label>

    <input type="radio" name="gender" value="Male">
    Male

    <input type="radio" name="gender" value="Female">
    Female

    <br><br>

    <label>Department:</label>

    <select name="department">

        <option value="">Select Department</option>

        <option value="CSE">
            CSE
        </option>

        <option value="EEE">
            EEE
        </option>

        <option value="BBA">
            BBA
        </option>

        <option value="English">
            English
        </option>

    </select>

    <br><br>

    <label>Address:</label>
    <br>

    <textarea name="address" rows="5" cols="40"></textarea>

    <br><br>

    <label>Upload Student Document:</label>

    <input type="file" name="document">

    <br><br>

    <input type="submit" value="Register">

</form>

</body>
</html>