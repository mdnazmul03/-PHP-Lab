<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Online Job Application Form</title>

</head>
<body>
<div class="container">
    <h2>Online Job Application Form</h2>

    <form action="process.php" method="POST" enctype="multipart/form-data">

        <label for="applicant_id">Applicant ID</label>
        <input type="text" id="applicant_id" name="applicant_id">
</br></br>
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name">
</br></br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
</br></br>
        <label for="phone">Phone Number</label>
        <input type="text" id="phone" name="phone" placeholder="11 digit number">
</br></br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <span class="hint">Minimum 6 characters</span>
</br></br>
        <label>Gender</label>
        <div class="radio-group">
            <label><input type="radio" name="gender" value="Male"> Male</label>
            <label><input type="radio" name="gender" value="Female"> Female</label>
        </div>
</br></br>
        <label for="job_position">Job Position</label>
        <select id="job_position" name="job_position">
            <option value="">-- Select Job Position --</option>
            <option value="Software Developer">Software Developer</option>
            <option value="Web Developer">Web Developer</option>
            <option value="Database Administrator">Database Administrator</option>
            <option value="Network Engineer">Network Engineer</option>
        </select>
</br></br>
        <label for="qualification">Educational Qualification</label>
        <input type="text" id="qualification" name="qualification" placeholder="e.g. BSc in CSE">
</br></br>
        <label for="address">Address</label>
        <textarea id="address" name="address" rows="3"></textarea>
</br></br>
        <label for="cv">Upload CV (PDF, DOC, DOCX - Max 2MB)</label>
        <input type="file" id="cv" name="cv">
</br></br>
        <button type="submit" name="submit">Submit Application</button>
    </form>
</div>
</body>
</html>