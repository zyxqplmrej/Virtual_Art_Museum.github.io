<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if (!empty($username) && !empty($password)) {
        // Очищаємо від зайвих пробілів
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);

        $file = fopen("users.txt", "r");
        $user_found = false;
        while (($line = fgets($file)) !== false) {
            list($stored_username, $stored_password) = explode(",", trim($line));
            
            if ($stored_username == $username && $stored_password == $password) {
                $user_found = true;
                break;
            }
        }
        fclose($file);

        if ($user_found) {
            echo "Welcome, $username! You have successfully logged in.";
        } else {
            echo "Incorrect username or password.";
        }
    } else {
        echo "Please fill in all fields!";
    }
}
?>

<link rel="stylesheet" href="../css/style.css">

<form action="login.php" method="POST">
    <label for="username">User name:</label>
    <input type="text" name="username" id="username" required><br><br>
    
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br>
    
    <input type="submit" value="Sign in">
    <br><br><p>Don't have an account yet? <a href="signup.php">Sign up</a></p>
    <br><p>Already have an account? <a href="../index.html">Back to museum</a></p>
</form>
