<?php
require_once "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $id   = trim($_POST["id"]);

    if ($name === "" || $id === "") {
        $message = "Name and ID are both required.";
    } else {
        $stmt = $conn->prepare("INSERT INTO people (name, id_number) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $id);
        $stmt->execute();
        $stmt->close();
        $message = "Saved successfully!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Simple Form with AJAX</title>
</head>
<body>

    <h1>Simple Registration Form (AJAX live check)</h1>

    <?php if ($message): ?>
        <p><b><?php echo htmlspecialchars($message); ?></b></p>
    <?php endif; ?>

    <form method="POST" id="myForm">
        <label>Name:</label><br>
        <input type="text" name="name" id="name" autocomplete="off"><br>
        <span id="name_msg" style="color:red;"></span><br><br>

        <label>ID:</label><br>
        <input type="text" name="id" id="id"><br><br>

        <button type="submit">Submit</button>
    </form>

    <script>
    // Runs on every single keystroke (keyup) inside the Name field
    document.getElementById("name").addEventListener("keyup", function () {
        var value = this.value.trim();
        var box = document.getElementById("name_msg");

        if (value === "") {
            box.innerHTML = "";
            return;
        }

        var xhr = new XMLHttpRequest();
        xhr.open("GET", "check_name.php?name=" + encodeURIComponent(value), true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                box.innerHTML = data.exists ? "Already exist" : "";
            }
        };
        xhr.send();
    });
    </script>

</body>
</html>
