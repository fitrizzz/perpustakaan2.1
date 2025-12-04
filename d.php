<?php
session_start();

// Hardcoded credentials (Replace with your own)
$valid_username = "admin";
$valid_password = "12345";

$errorMsg = "";  // Stores error message
$showDialog = false; // Controls whether the dialog stays open

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Check credentials
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION["user"] = $username;
        header("Location: dashboard.php"); // Redirect on success
        exit();
    } else {
        $errorMsg = "Invalid username or password!";
        $showDialog = true; // Keep dialog open on failure
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dialog</title>
</head>
<body>

<!-- Login Button -->
<button onclick="document.getElementById('loginDialog').showModal()">Login</button>

<!-- Login Dialog -->
<dialog id="loginDialog">
    <h3>Login</h3>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
        <button type="button" onclick="document.getElementById('loginDialog').close()">Close</button>
        <p style="color:red;"><?php echo $errorMsg; ?></p>
    </form>
</dialog>

<script>
    // Keep the dialog open if login fails
    <?php if ($showDialog): ?>
        document.getElementById('loginDialog').showModal();
    <?php endif; ?>
</script>

</body>
</html>